<?php

namespace App\Filament\Resources\PointsInteretResource\Pages;

use App\Filament\Resources\PointsInteretResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPointsInteret extends ViewRecord
{
    protected static string $resource = PointsInteretResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
