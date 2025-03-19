<?php

namespace App\Providers;

use Swis\Filament\Backgrounds\Contracts\ProvidesImages;
use Swis\Filament\Backgrounds\Image;

class MyImageProvider implements ProvidesImages
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getImage(): Image
    {
        return new Image(
            'url("' . asset('images/swisnl/filament-backgrounds/curated-by-swis/13.jpg') . '")', // Utilise une image locale C:\xampp\htdocs\new--rassed-map\public\images\swisnl\filament-backgrounds
            'Photo by ARSD - DTS' // Attribution (facultatif)
        );
    }
}
