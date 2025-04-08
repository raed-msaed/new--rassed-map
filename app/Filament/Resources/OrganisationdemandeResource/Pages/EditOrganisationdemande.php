<?php

namespace App\Filament\Resources\OrganisationdemandeResource\Pages;

use App\Filament\Resources\OrganisationdemandeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrganisationdemande extends EditRecord
{
    protected static string $resource = OrganisationdemandeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
