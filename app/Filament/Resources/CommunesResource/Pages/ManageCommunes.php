<?php

namespace App\Filament\Resources\CommunesResource\Pages;

use App\Filament\Resources\CommunesResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCommunes extends ManageRecords
{
    protected static string $resource = CommunesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
