<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class MapPage extends Page
{
    /*protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.map-page';*/

    protected static string $view = 'filament.pages.map-page'; // Reference your Blade view
    protected static ?string $navigationIcon = 'heroicon-o-map'; // Optional icon
    protected static ?string $navigationLabel = 'Map'; // Label for navigation
    protected static ?int $navigationSort = 2; // Sort order in the menu
}
