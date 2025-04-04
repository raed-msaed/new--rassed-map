<?php

namespace App\Filament\Resources\SuivExecMissionResource\Pages;

use App\Filament\Resources\SuivExecMissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSuivExecMission extends ViewRecord
{
    protected static string $resource = SuivExecMissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
