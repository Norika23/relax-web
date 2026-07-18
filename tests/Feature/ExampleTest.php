<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response
            ->assertStatus(200)
            ->assertSee('難しく考えなくて大丈夫です')
            ->assertSee('LINEで無料相談する')
            ->assertSee('5,500')
            ->assertSee('初期制作費なし')
            ->assertSee('安心して問い合わせできるところまで整えます')
            ->assertSee('ホームページの情報を分かりやすく整える')
            ->assertSee('現在確認中の項目')
            ->assertDontSee('自社ネット予約デモ');
    }

    public function test_the_previous_top_page_is_preserved(): void
    {
        $this->get('/old')
            ->assertOk()
            ->assertSee('Relax Web')
            ->assertSee('PRICE PLAN');
    }

    public function test_the_booking_demo_links_to_the_internal_reservation_page(): void
    {
        $response = $this->get('/demo');

        $response
            ->assertStatus(200)
            ->assertSee('nagi relaxation salon')
            ->assertSee('/demo/reservation', false)
            ->assertDontSee('app.squareup.com', false);
    }

    public function test_the_line_booking_demo_is_available(): void
    {
        $this->get('/demo2')
            ->assertOk()
            ->assertSee('suu massage')
            ->assertSee('LINEで相談・予約する')
            ->assertSee('https://lin.ee/v0rjWGs', false);
    }
}
