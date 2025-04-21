<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organisationdemande extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function demande(): HasMany
    {
        return $this->hasMany(Demande::class);
    }
}
