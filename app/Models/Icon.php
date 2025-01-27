<?php

namespace App\Models;

use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Icon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function icon(): HasMany
    {
        return $this->hasMany(Point::class);
    }

    protected static function booted(): void
    {
        static::deleting(function ($icon) {
            if ($icon->path) {
                Storage::disk('icons')->delete(basename($icon->path));
            }
        });
    }
}
