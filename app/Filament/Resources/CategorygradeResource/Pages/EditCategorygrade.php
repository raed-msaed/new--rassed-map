<?php

namespace App\Filament\Resources\CategorygradeResource\Pages;

use App\Filament\Resources\CategorygradeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategorygrade extends EditRecord
{
    protected static string $resource = CategorygradeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
