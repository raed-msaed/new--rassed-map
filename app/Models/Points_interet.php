<?php

namespace App\Models;

use App\Policies\ZonePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Points_interet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function zone_interet(): HasMany
    {
        return $this->hasMany(Zone_interet::class);
    }

    public function icon(): BelongsTo
    {
        return $this->belongsTo(Icon::class);
    }
}
