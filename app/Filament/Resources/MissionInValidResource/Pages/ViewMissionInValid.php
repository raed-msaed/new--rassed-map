<?php

namespace App\Filament\Resources\MissionInValidResource\Pages;

use App\Filament\Resources\MissionInValidResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMissionInValid extends ViewRecord
{
    protected static string $resource = MissionInValidResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
