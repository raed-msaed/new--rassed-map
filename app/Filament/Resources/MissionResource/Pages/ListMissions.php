<?php

namespace App\Filament\Resources\MissionResource\Pages;

use App\Filament\Resources\MissionResource;
use App\Filament\Resources\MissionResource\Widgets\MissionStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMissions extends ListRecords
{
    protected static string $resource = MissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
