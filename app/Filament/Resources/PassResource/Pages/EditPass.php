<?php

namespace App\Filament\Resources\PassResource\Pages;

use App\Filament\Resources\PassResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPass extends EditRecord
{
    protected static string $resource = PassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
