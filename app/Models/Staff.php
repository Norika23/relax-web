<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;
    protected $table = 'staffs';
    protected $fillable = ['shop_id','name','bio','photo_path','nomination_fee','is_active','can_accept_reservations','display_order'];
    protected function casts(): array { return ['is_active'=>'boolean','can_accept_reservations'=>'boolean']; }
    public function shop(): BelongsTo { return $this->belongsTo(Shop::class); }
    public function services(): BelongsToMany { return $this->belongsToMany(Service::class, 'staff_service'); }
    public function workingHours(): HasMany { return $this->hasMany(StaffWorkingHour::class); }
    public function reservations(): HasMany { return $this->hasMany(Reservation::class); }
}
