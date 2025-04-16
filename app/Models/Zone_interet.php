<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Zone_interet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }

    public function points_zone(): HasMany
    {
        return $this->hasMany(Points_zone::class);
    }
    public function points_interet(): HasMany
    {
        return $this->hasMany(Points_interet::class);
    }

    public function suiv_mission(): HasMany
    {
        return $this->hasMany(Suiv_mission::class);
    }
}
