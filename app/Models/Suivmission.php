<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Suivmission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mission(): BelongsTo
    {
        return $this->belongsTo(Suivmission::class);
    }

    public function point(): HasMany
    {
        return $this->hasMany(Point::class);
    }
}