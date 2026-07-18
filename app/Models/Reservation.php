<?php

namespace App\Models;

use App\Casts\UtcDateTime;
use App\Enums\ReservationSource;
use App\Enums\ReservationStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $fillable=['shop_id','service_id','staff_id','customer_name','phone','email','starts_at','ends_at','service_price','nomination_fee','total_price','status','notes','source','cancellation_token'];
    protected function casts():array{return ['starts_at'=>UtcDateTime::class,'ends_at'=>UtcDateTime::class,'status'=>ReservationStatus::class,'source'=>ReservationSource::class];}
    public function shop():BelongsTo{return $this->belongsTo(Shop::class);}
    public function service():BelongsTo{return $this->belongsTo(Service::class);}
    public function staff():BelongsTo{return $this->belongsTo(Staff::class);}
}
