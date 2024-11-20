<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Point extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mission(): BelongsTo
    {
        return $this->belongsTo(Mission::class);
    }

    public function icon(): BelongsTo
    {
        return $this->belongsTo(Icon::class);
    }

    public function suivmission(): BelongsTo
    {
        return $this->belongsTo(Suivmission::class);
    }
}
