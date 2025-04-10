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

    // Relation many-to-many avec Demande (comme zone d'intérêt)
    public function demandesInteret()
    {
        return $this->belongsToMany(Demande::class, 'demande_zone_interet', 'zone_id', 'demande_id');
    }

    public function zone_interet(): HasMany
    {
        return $this->hasMany(Zone_interet::class);
    }
}
