<?php

namespace App\Filament\Resources\CategorygradeResource\Pages;

use App\Filament\Resources\CategorygradeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCategorygrade extends ViewRecord
{
    protected static string $resource = CategorygradeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
