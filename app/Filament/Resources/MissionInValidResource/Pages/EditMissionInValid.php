<?php

namespace App\Filament\Resources\MissionInValidResource\Pages;

use App\Filament\Resources\MissionInValidResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMissionInValid extends EditRecord
{
    protected static string $resource = MissionInValidResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
