<?php

namespace App\Filament\Resources\PassTypeResource\Pages;

use App\Filament\Resources\PassTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePassTypes extends ManageRecords
{
    protected static string $resource = PassTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
