<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class StaffWorkingHour extends Model { protected $fillable=['staff_id','weekday','starts_at','ends_at','is_day_off']; protected function casts():array{return ['is_day_off'=>'boolean'];} public function staff():BelongsTo{return $this->belongsTo(Staff::class);} }
