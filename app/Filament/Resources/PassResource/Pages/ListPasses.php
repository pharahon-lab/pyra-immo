<?php

namespace App\Filament\Resources\PassResource\Pages;

use App\Filament\Resources\PassResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPasses extends ListRecords
{
    protected static string $resource = PassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
