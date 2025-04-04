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

    public function demande(): BelongsTo
    {
        return $this->belongsTo(Demande::class)->orderBy('id', 'desc');
    }
}
