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
        return $this->belongsTo(Mission::class)->orderBy('id', 'desc');
    }

    public function point(): BelongsTo
    {
        return $this->belongsTo(Point::class)->orderBy('id', 'desc');
    }
}
