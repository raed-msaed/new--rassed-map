<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorygrade extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function grade(): HasMany
    {
        return $this->hasMany(Grade::class);
    }
}
