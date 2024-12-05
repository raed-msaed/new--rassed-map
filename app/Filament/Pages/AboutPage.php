<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class AboutPage extends Page
{
    protected static ?string $navigationLabel = 'التعريف والمساعدة';
    protected static ?string $title = 'التعريف والمساعدة';
    protected static ?string $slug = 'about-help'; // URL: /admin/about-help
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static string $view = 'filament.pages.about-page';
    protected static ?string $navigationGroup = 'تعريف المنظومة';
    protected static ?int $navigationSort = 9999;
    public function mount(): void
    {
        // Any initialization logic can go here
    }
}