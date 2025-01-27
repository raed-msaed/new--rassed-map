<?php

namespace App\Filament\Resources\MissionValidResource\Pages;

use App\Filament\Resources\MissionValidResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMissionValids extends ListRecords
{
    protected static string $resource = MissionValidResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //  Actions\CreateAction::make(),
        ];
    }
}
