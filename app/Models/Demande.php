<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Demande extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function zone(): HasMany
    {
        return $this->hasMany(Zone::class);
    }

    public function type_mission(): BelongsTo
    {
        return $this->belongsTo(Type_mission::class);
    }

    public function organisationdemande(): BelongsTo
    {
        return $this->belongsTo(Organisationdemande::class);
    }

    // Accès direct aux zones d'intérêt via les zones
    public function zonesInterets()
    {
        return $this->hasManyThrough(
            Zone_interet::class,
            Zone::class,
            'demande_id', // Clé étrangère dans zones
            'zone_id', // Clé étrangère dans zones_interets (à confirmer selon votre structure)
            'id', // Clé locale dans demands
            'id' // Clé locale dans zones
        );
    }


    public function organisationaccord(): BelongsTo
    {
        return $this->belongsTo(Organisationaccord::class);
    }

    public function suivmission(): HasMany
    {
        return $this->hasMany(Suiv_mission::class);
    }
}
