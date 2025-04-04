<?php

namespace App\Filament\Resources\SuivExecMissionResource\Pages;

use App\Filament\Resources\SuivExecMissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuivExecMission extends EditRecord
{
    protected static string $resource = SuivExecMissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
