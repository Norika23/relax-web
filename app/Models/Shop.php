<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','email','phone','timezone','slot_interval_minutes'];
    public function services(): HasMany { return $this->hasMany(Service::class); }
    public function staffs(): HasMany { return $this->hasMany(Staff::class); }
    public function businessHours(): HasMany { return $this->hasMany(BusinessHour::class); }
    public function reservations(): HasMany { return $this->hasMany(Reservation::class); }
    public function blockedTimes(): HasMany { return $this->hasMany(BlockedTime::class); }
}
