<?php
namespace App\Models;
use App\Casts\UtcDateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class BlockedTime extends Model { protected $fillable=['shop_id','staff_id','starts_at','ends_at','reason']; protected function casts():array{return ['starts_at'=>UtcDateTime::class,'ends_at'=>UtcDateTime::class];} public function shop():BelongsTo{return $this->belongsTo(Shop::class);} public function staff():BelongsTo{return $this->belongsTo(Staff::class);} }
