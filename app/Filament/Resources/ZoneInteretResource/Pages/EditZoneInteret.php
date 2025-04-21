<?php

namespace App\Filament\Resources\ZoneInteretResource\Pages;

use App\Filament\Resources\ZoneInteretResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZoneInteret extends EditRecord
{
    protected static string $resource = ZoneInteretResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
