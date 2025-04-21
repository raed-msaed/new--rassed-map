<?php

namespace App\Filament\Resources\ZoneInteretResource\Pages;

use App\Filament\Resources\ZoneInteretResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZoneInterets extends ListRecords
{
    protected static string $resource = ZoneInteretResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
