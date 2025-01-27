<?php

namespace App\Filament\Resources\MissionValidResource\Pages;

use App\Filament\Resources\MissionValidResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMissionValid extends EditRecord
{
    protected static string $resource = MissionValidResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
