<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $fillable = ['shop_id','name','description','price','duration_minutes','buffer_minutes','is_active','display_order'];
    protected function casts(): array { return ['is_active'=>'boolean']; }
    public function shop(): BelongsTo { return $this->belongsTo(Shop::class); }
    public function staffs(): BelongsToMany { return $this->belongsToMany(Staff::class, 'staff_service'); }
}
