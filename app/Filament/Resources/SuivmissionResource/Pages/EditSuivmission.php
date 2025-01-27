<?php

namespace App\Filament\Resources\SuivmissionResource\Pages;

use App\Filament\Resources\SuivmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuivmission extends EditRecord
{
    protected static string $resource = SuivmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
