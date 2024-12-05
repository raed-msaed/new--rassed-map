<?php

namespace App\Filament\Resources\MissionValidResource\Pages;

use App\Filament\Resources\MissionValidResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMissionValid extends ViewRecord
{
    protected static string $resource = MissionValidResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
