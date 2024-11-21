<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Point extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mission(): BelongsTo
    {
        return $this->belongsTo(Mission::class)->orderBy('id', 'desc'); // A point belongs to a mission
    }

    public function icon(): BelongsTo
    {
        return $this->belongsTo(Icon::class)->orderBy('id', 'asc');
    }

    public function suivmission(): HasMany
    {
        return $this->hasMany(Suivmission::class);  // A point has one suivmission
    }
}
