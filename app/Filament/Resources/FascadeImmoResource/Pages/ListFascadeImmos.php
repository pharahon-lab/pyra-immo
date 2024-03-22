<?php

namespace App\Filament\Resources\FascadeImmoResource\Pages;

use App\Filament\Resources\FascadeImmoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFascadeImmos extends ListRecords
{
    protected static string $resource = FascadeImmoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
