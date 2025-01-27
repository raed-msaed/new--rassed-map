<?php

namespace App\Filament\Resources\OrganisationaccordResource\Pages;

use App\Filament\Resources\OrganisationaccordResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOrganisationaccord extends ViewRecord
{
    protected static string $resource = OrganisationaccordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
