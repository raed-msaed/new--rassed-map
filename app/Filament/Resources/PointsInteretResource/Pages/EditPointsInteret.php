<?php

namespace App\Filament\Resources\PointsInteretResource\Pages;

use App\Filament\Resources\PointsInteretResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPointsInteret extends EditRecord
{
    protected static string $resource = PointsInteretResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
