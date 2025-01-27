<?php

namespace App\Filament\Resources\MissionInValidResource\Pages;

use App\Filament\Resources\MissionInValidResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMissionInValids extends ListRecords
{
    protected static string $resource = MissionInValidResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
