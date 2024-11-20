<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function points(): HasMany
    {
        return $this->hasMany(Point::class);
    }

    public function suivmission(): HasMany
    {
        return $this->hasMany(Suivmission::class);
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class, 'organisation_id');
    }

    public function organisationaccord()
    {
        return $this->belongsTo(Organisation::class, 'organisationaccord');
    }
}
