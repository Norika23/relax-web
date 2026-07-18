<?php

namespace Database\Seeders;

use App\Models\BusinessHour;
use App\Models\Service;
use App\Models\Shop;
use App\Models\Staff;
use App\Models\StaffWorkingHour;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $shop = Shop::updateOrCreate(['name' => 'テスト整体院'], [
            'email' => 'relax.web.support@gmail.com', 'phone' => '03-0000-0000',
            'timezone' => 'Asia/Tokyo', 'slot_interval_minutes' => 30,
        ]);
        User::updateOrCreate(['email' => 'admin@example.com'], [
            'shop_id' => $shop->id, 'name' => '店舗管理者', 'password' => Hash::make('password'),
        ]);

        $serviceData = [
            ['name'=>'もみほぐし60分','description'=>'全身を丁寧にほぐします。','price'=>6000,'duration_minutes'=>60,'buffer_minutes'=>15,'display_order'=>1],
            ['name'=>'もみほぐし90分','description'=>'疲れが強い方向けの全身コースです。','price'=>8500,'duration_minutes'=>90,'buffer_minutes'=>15,'display_order'=>2],
            ['name'=>'オイルマッサージ60分','description'=>'オイルを使い、ゆっくり流します。','price'=>7500,'duration_minutes'=>60,'buffer_minutes'=>15,'display_order'=>3],
        ];
        $services = collect($serviceData)->map(fn($data) => Service::updateOrCreate(
            ['shop_id'=>$shop->id,'name'=>$data['name']], $data + ['is_active'=>true]
        ));
        $tanaka = Staff::updateOrCreate(['shop_id'=>$shop->id,'name'=>'田中'], ['bio'=>'丁寧な施術を心がけています。','nomination_fee'=>0,'is_active'=>true,'can_accept_reservations'=>true,'display_order'=>1]);
        $sato = Staff::updateOrCreate(['shop_id'=>$shop->id,'name'=>'佐藤'], ['bio'=>'しっかりめの施術が得意です。','nomination_fee'=>0,'is_active'=>true,'can_accept_reservations'=>true,'display_order'=>2]);
        $tanaka->services()->sync($services->pluck('id'));
        $sato->services()->sync($services->whereIn('name',['もみほぐし60分','もみほぐし90分'])->pluck('id'));

        foreach (range(0, 6) as $weekday) {
            BusinessHour::updateOrCreate(['shop_id'=>$shop->id,'weekday'=>$weekday], ['opens_at'=>'10:00','closes_at'=>'20:00','is_closed'=>false]);
            StaffWorkingHour::updateOrCreate(['staff_id'=>$tanaka->id,'weekday'=>$weekday], ['starts_at'=>'10:00','ends_at'=>'18:00','is_day_off'=>false]);
            StaffWorkingHour::updateOrCreate(['staff_id'=>$sato->id,'weekday'=>$weekday], ['starts_at'=>'12:00','ends_at'=>'20:00','is_day_off'=>false]);
        }
    }
}
