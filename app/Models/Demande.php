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

    // Relation many-to-many avec Zone (zones d'intérêt)
    public function zonesInteret()
    {
        return $this->belongsToMany(Zone::class, 'demande_zone_interet', 'demande_id', 'zone_id');
    }

    public function organisationdemande(): BelongsTo
    {
        return $this->belongsTo(Organisationdemande::class);
    }

    public function organisationaccord(): BelongsTo
    {
        return $this->belongsTo(Organisationaccord::class);
    }
    public function type_mission(): BelongsTo
    {
        return $this->belongsTo(Type_mission::class);
    }
    public function suivmission(): HasMany
    {
        return $this->hasMany(Suiv_mission::class);
    }
}
