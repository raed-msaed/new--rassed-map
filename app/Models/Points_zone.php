<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Points_zone extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }
}
