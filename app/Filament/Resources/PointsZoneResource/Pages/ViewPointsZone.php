<?php

namespace App\Filament\Resources\PointsZoneResource\Pages;

use App\Filament\Resources\PointsZoneResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPointsZone extends ViewRecord
{
    protected static string $resource = PointsZoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
