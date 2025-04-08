<?php

namespace App\Filament\Resources\OrganisationdemandeResource\Pages;

use App\Filament\Resources\OrganisationdemandeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOrganisationdemande extends ViewRecord
{
    protected static string $resource = OrganisationdemandeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
