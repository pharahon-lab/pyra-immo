<?php

namespace App\Filament\Resources\FascadeImmoResource\Pages;

use App\Filament\Resources\FascadeImmoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFascadeImmo extends ViewRecord
{
    protected static string $resource = FascadeImmoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
