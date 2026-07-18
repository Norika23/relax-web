<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class BusinessHour extends Model { protected $fillable=['shop_id','weekday','opens_at','closes_at','is_closed']; protected function casts():array{return ['is_closed'=>'boolean'];} public function shop():BelongsTo{return $this->belongsTo(Shop::class);} }
