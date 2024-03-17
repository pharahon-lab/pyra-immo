<?php

namespace App\Filament\Resources\AbonnementTypeResource\Pages;

use App\Filament\Resources\AbonnementTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAbonnementTypes extends ManageRecords
{
    protected static string $resource = AbonnementTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
