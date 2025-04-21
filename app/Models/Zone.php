<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Zone extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function demande(): BelongsTo
    {
        return $this->belongsTo(Demande::class);
    }

    public function zoneInterets(): HasMany
    {
        return $this->hasMany(Zone_interet::class, 'zone_id');
    }

    public function suiv_mission(): HasMany
    {
        return $this->hasMany(Suiv_mission::class);
    }
}