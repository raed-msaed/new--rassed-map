<?php

namespace App\Filament\Resources\OrganisationaccordResource\Pages;

use App\Filament\Resources\OrganisationaccordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrganisationaccord extends EditRecord
{
    protected static string $resource = OrganisationaccordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
