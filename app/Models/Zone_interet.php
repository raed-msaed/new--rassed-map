<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Zone_interet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }
}
