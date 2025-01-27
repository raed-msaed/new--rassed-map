<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organisationaccord extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mission(): HasMany
    {
        return $this->hasMany(Mission::class);
    }
}
