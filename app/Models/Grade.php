<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categorygrade(): BelongsTo
    {
        return $this->belongsTo(Categorygrade::class);
    }
}