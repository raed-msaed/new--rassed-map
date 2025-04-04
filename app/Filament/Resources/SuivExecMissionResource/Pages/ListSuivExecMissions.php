<?php

namespace App\Filament\Resources\SuivExecMissionResource\Pages;

use App\Filament\Resources\SuivExecMissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuivExecMissions extends ListRecords
{
    protected static string $resource = SuivExecMissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
