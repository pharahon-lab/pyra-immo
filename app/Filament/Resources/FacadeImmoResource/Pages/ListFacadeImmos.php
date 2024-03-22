<?php

namespace App\Filament\Resources\FacadeImmoResource\Pages;

use App\Filament\Resources\FacadeImmoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFacadeImmos extends ListRecords
{
    protected static string $resource = FacadeImmoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
