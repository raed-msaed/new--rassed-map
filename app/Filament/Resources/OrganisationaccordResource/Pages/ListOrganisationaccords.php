<?php

namespace App\Filament\Resources\OrganisationaccordResource\Pages;

use App\Filament\Resources\OrganisationaccordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrganisationaccords extends ListRecords
{
    protected static string $resource = OrganisationaccordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
