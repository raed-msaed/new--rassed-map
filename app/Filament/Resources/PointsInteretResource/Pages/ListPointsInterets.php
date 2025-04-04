<?php

namespace App\Filament\Resources\PointsInteretResource\Pages;

use App\Filament\Resources\PointsInteretResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPointsInterets extends ListRecords
{
    protected static string $resource = PointsInteretResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
