<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Suiv_mission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function demande(): BelongsTo
    {
        return $this->belongsTo(Demande::class)->orderBy('id', 'desc');
    }

    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }

    public function zone_interet(): BelongsTo
    {
        return $this->belongsTo(Zone_interet::class);
    }

    public function points_interetSelectionnes(): BelongsToMany
    {
        return $this->belongsToMany(Points_interet::class);
    }
}
