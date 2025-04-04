<?php

namespace App\Filament\Resources\PointsZoneResource\Pages;

use App\Filament\Resources\PointsZoneResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPointsZones extends ListRecords
{
    protected static string $resource = PointsZoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
