<?php

namespace App\Filament\Resources\CategorygradeResource\Pages;

use App\Filament\Resources\CategorygradeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategorygrades extends ListRecords
{
    protected static string $resource = CategorygradeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
