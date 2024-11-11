<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Icon extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::deleting(function ($icon) {
            if ($icon->icon_path && Storage::disk('public')->exists($icon->icon_path)) {
                Storage::disk('public')->delete($icon->icon_path);
            }
        });
    }
}
