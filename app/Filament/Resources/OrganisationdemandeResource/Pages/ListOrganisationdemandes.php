<?php

namespace App\Filament\Resources\OrganisationdemandeResource\Pages;

use App\Filament\Resources\OrganisationdemandeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrganisationdemandes extends ListRecords
{
    protected static string $resource = OrganisationdemandeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
