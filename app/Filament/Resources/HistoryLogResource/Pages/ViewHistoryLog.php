<?php

namespace App\Filament\Resources\HistoryLogResource\Pages;

use App\Filament\Resources\HistoryLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHistoryLog extends ViewRecord
{
    protected static string $resource = HistoryLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\EditAction::make(),
        ];
    }
}
