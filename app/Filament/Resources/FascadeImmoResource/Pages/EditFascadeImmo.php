<?php

namespace App\Filament\Resources\FascadeImmoResource\Pages;

use App\Filament\Resources\FascadeImmoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFascadeImmo extends EditRecord
{
    protected static string $resource = FascadeImmoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
