<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Demande extends Model
{
    public function zones(): HasMany
    {
        return $this->hasMany(Zone::class);
    }

    public function organisation(): BelongsTo
    {
        return $this->belongsTo(Organisation::class);
    }

    public function type_mission(): BelongsTo
    {
        return $this->belongsTo(Type_mission::class);
    }
    public function suivmission(): HasMany
    {
        return $this->hasMany(Suivmission::class);
    }
}
