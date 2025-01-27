<?php

namespace App\Filament\Resources\SuivmissionResource\Pages;

use App\Filament\Resources\SuivmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSuivmission extends ViewRecord
{
    protected static string $resource = SuivmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
