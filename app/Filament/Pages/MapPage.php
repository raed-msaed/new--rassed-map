<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\DailyMissionsChartWidget;
use App\Filament\Widgets\MissionsChartWidget;
use App\Filament\Widgets\MissionsExecutedWidget;
use Filament\Pages\Page;

class MapPage extends Page
{
    /*protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.map-page';*/

    protected static string $view = 'filament.pages.map-page'; // Reference your Blade view
    protected static ?string $navigationIcon = 'heroicon-o-map'; // Optional icon
    protected static ?string $navigationLabel = 'خريطة البلاد التونسية'; // Label for navigation
    protected static ?int $navigationSort = 1; // Sort order in the menu
    // Disable the title
    protected static ?string $title = ''; // Or set to null
    // Use the full layout
    //protected static string $layout = 'filament::layouts.full'; // Use a full layout
}
