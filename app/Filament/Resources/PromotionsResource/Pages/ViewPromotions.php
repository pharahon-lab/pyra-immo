<?php

namespace App\Filament\Resources\PromotionsResource\Pages;

use App\Filament\Resources\PromotionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPromotions extends ViewRecord
{
    protected static string $resource = PromotionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
