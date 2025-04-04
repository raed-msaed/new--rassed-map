<?php

namespace App\Filament\Resources\ZoneInteretResource\Pages;

use App\Filament\Resources\ZoneInteretResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewZoneInteret extends ViewRecord
{
    protected static string $resource = ZoneInteretResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
