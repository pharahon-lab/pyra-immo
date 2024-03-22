<?php

namespace App\Filament\Resources\FacadeImmoResource\Pages;

use App\Filament\Resources\FacadeImmoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFacadeImmo extends EditRecord
{
    protected static string $resource = FacadeImmoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
