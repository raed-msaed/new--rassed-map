<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mission(): BelongsTo
    {
        return $this->belongsTo(Mission::class);
    }

    public function points_zones(): HasMany
    {
        return $this->hasMany(Points_zone::class);
    }

    public function points_interet(): HasMany
    {
        return $this->hasMany(Points_interet::class);
    }
}
