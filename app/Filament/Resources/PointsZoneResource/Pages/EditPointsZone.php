<?php

namespace App\Filament\Resources\PointsZoneResource\Pages;

use App\Filament\Resources\PointsZoneResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPointsZone extends EditRecord
{
    protected static string $resource = PointsZoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
