<?php

namespace Tests\Feature;

use App\Enums\ReservationSource;
use App\Models\BlockedTime;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Shop;
use App\Models\Staff;
use App\Models\User;
use App\Services\AvailabilityService;
use App\Services\ReservationService;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class ReservationSystemTest extends TestCase
{
    use RefreshDatabase;

    private Shop $shop;
    private Service $service;
    private Staff $tanaka;
    private Staff $sato;

    protected function setUp(): void
    {
        parent::setUp();

        CarbonImmutable::setTestNow(CarbonImmutable::parse('2026-08-03 08:00', 'Asia/Tokyo'));
        Queue::fake();
        $this->seed();

        $this->shop = Shop::firstOrFail();
        $this->service = $this->shop->services()->orderBy('display_order')->firstOrFail();
        $this->tanaka = $this->shop->staffs()->orderBy('display_order')->firstOrFail();
        $this->sato = $this->shop->staffs()->orderBy('display_order')->skip(1)->firstOrFail();
    }

    protected function tearDown(): void
    {
        CarbonImmutable::setTestNow();
        parent::tearDown();
    }

    public function test_an_available_slot_can_be_booked(): void
    {
        $reservation = $this->book($this->tanaka, $this->service, '2026-08-03 10:00');

        $this->assertDatabaseHas('reservations', ['id' => $reservation->id]);
    }

    public function test_overlapping_reservations_for_the_same_staff_are_rejected(): void
    {
        $this->book($this->tanaka, $this->service, '2026-08-03 10:00');

        $this->expectException(ValidationException::class);
        $this->book($this->tanaka, $this->service, '2026-08-03 10:30');
    }

    public function test_a_reservation_can_start_exactly_when_the_previous_one_ends(): void
    {
        $short = Service::create([
            'shop_id' => $this->shop->id,
            'name' => 'Short test course',
            'price' => 3000,
            'duration_minutes' => 30,
            'buffer_minutes' => 0,
            'is_active' => true,
        ]);
        $this->tanaka->services()->attach($short);

        $this->book($this->tanaka, $short, '2026-08-03 10:00');
        $second = $this->book($this->tanaka, $short, '2026-08-03 10:30');

        $this->assertDatabaseHas('reservations', ['id' => $second->id]);
    }

    public function test_buffer_time_is_part_of_the_overlap_check(): void
    {
        $this->book($this->tanaka, $this->service, '2026-08-03 10:00');

        $this->expectException(ValidationException::class);
        $this->book($this->tanaka, $this->service, '2026-08-03 11:00');
    }

    public function test_booking_outside_staff_working_hours_is_rejected(): void
    {
        $this->expectException(ValidationException::class);
        $this->book($this->tanaka, $this->service, '2026-08-03 18:00');
    }

    public function test_blocked_time_cannot_be_booked(): void
    {
        BlockedTime::create([
            'shop_id' => $this->shop->id,
            'staff_id' => $this->tanaka->id,
            'starts_at' => $this->utc('2026-08-03 10:30'),
            'ends_at' => $this->utc('2026-08-03 11:30'),
            'reason' => 'break',
        ]);

        $this->expectException(ValidationException::class);
        $this->book($this->tanaka, $this->service, '2026-08-03 10:00');
    }

    public function test_staff_cannot_be_booked_for_an_unassigned_service(): void
    {
        $oil = $this->shop->services()->orderByDesc('display_order')->firstOrFail();

        $this->expectException(ValidationException::class);
        $this->book($this->sato, $oil, '2026-08-03 12:00');
    }

    public function test_different_staff_can_be_booked_at_the_same_time(): void
    {
        $first = $this->book($this->tanaka, $this->service, '2026-08-03 12:00');
        $second = $this->book($this->sato, $this->service, '2026-08-03 12:00');

        $this->assertNotSame($first->id, $second->id);
    }

    public function test_same_staff_cannot_receive_two_bookings_at_the_same_time(): void
    {
        $this->book($this->tanaka, $this->service, '2026-08-03 12:00');

        $this->expectException(ValidationException::class);
        $this->book($this->tanaka, $this->service, '2026-08-03 12:00');
    }

    public function test_phone_booking_removes_the_slot_from_online_availability(): void
    {
        $this->book($this->tanaka, $this->service, '2026-08-03 10:00', ReservationSource::Phone);

        $slots = app(AvailabilityService::class)
            ->slots($this->shop, $this->service, $this->tanaka, '2026-08-03')
            ->pluck('label');

        $this->assertFalse($slots->contains('10:00'));
    }

    public function test_direct_post_to_an_invalid_time_is_rejected(): void
    {
        $response = $this->from(route('demo.reservation.index'))->post(route('demo.reservation.store'), [
            'service_id' => $this->service->id,
            'staff_id' => $this->tanaka->id,
            'starts_at' => $this->utc('2026-08-03 09:00')->toIso8601String(),
            'customer_name' => 'Test Customer',
            'phone' => '09012345678',
            'email' => 'customer@example.com',
        ]);

        $response->assertRedirect(route('demo.reservation.index'));
        $response->assertSessionHasErrors('starts_at');
        $this->assertDatabaseCount('reservations', 0);
    }

    public function test_customer_booking_pages_render_and_complete_a_booking(): void
    {
        $this->get(route('demo.reservation.index'))
            ->assertOk()
            ->assertSee('ネット予約');

        $payload = [
            'service_id' => $this->service->id,
            'staff_id' => $this->tanaka->id,
            'starts_at' => $this->utc('2026-08-03 10:00')->toIso8601String(),
            'customer_name' => 'Test Customer',
            'phone' => '09012345678',
            'email' => 'customer@example.com',
            'notes' => 'Test note',
        ];

        $this->post(route('demo.reservation.confirm'), $payload)
            ->assertOk()
            ->assertSee('予約内容の確認');

        $this->post(route('demo.reservation.store'), $payload)
            ->assertRedirect(route('demo.reservation.complete'));

        $this->get(route('demo.reservation.complete'))
            ->assertOk()
            ->assertSee('ご予約ありがとうございます');
    }

    public function test_admin_pages_require_authentication_and_render_for_the_demo_admin(): void
    {
        $this->get(route('demo.admin.dashboard'))
            ->assertRedirect(route('demo.admin.login'));

        $this->actingAs(User::firstOrFail());

        foreach ([
            'demo.admin.dashboard',
            'demo.admin.reservations.index',
            'demo.admin.reservations.create',
            'demo.admin.services.index',
            'demo.admin.staffs.index',
            'demo.admin.schedules.index',
            'demo.admin.blocks.index',
        ] as $routeName) {
            $this->get(route($routeName))->assertOk();
        }
    }

    private function book(
        Staff $staff,
        Service $service,
        string $localStart,
        ReservationSource $source = ReservationSource::Web,
    ): Reservation {
        return app(ReservationService::class)->create($this->shop, [
            'service_id' => $service->id,
            'staff_id' => $staff->id,
            'starts_at' => $this->utc($localStart)->toIso8601String(),
            'customer_name' => 'Test Customer',
            'phone' => '09012345678',
            'email' => 'customer@example.com',
        ], $source);
    }

    private function utc(string $localDateTime): CarbonImmutable
    {
        return CarbonImmutable::parse($localDateTime, 'Asia/Tokyo')->utc();
    }
}
