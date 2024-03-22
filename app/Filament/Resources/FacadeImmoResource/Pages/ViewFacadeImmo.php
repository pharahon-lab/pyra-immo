<?php

namespace App\Filament\Resources\FacadeImmoResource\Pages;

use App\Filament\Resources\FacadeImmoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFacadeImmo extends ViewRecord
{
    protected static string $resource = FacadeImmoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
