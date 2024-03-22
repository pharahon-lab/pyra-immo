<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromotionsResource\Pages;
use App\Filament\Resources\PromotionsResource\RelationManagers;
use App\Models\Promotions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PromotionsResource extends Resource
{
    protected static ?string $model = Promotions::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('promo_code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('use_code')
                    ->required(),
                Forms\Components\DateTimePicker::make('start')
                    ->required(),
                Forms\Components\DateTimePicker::make('end')
                    ->required(),
                Forms\Components\Toggle::make('has_limit')
                    ->required(),
                Forms\Components\Toggle::make('is_used')
                    ->required(),
                Forms\Components\TextInput::make('usage_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('limit')
                    ->numeric()
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('promo_code')
                    ->searchable(),
                Tables\Columns\IconColumn::make('use_code')
                    ->boolean(),
                Tables\Columns\TextColumn::make('start')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('has_limit')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_used')
                    ->boolean(),
                Tables\Columns\TextColumn::make('usage_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('limit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPromotions::route('/'),
            'create' => Pages\CreatePromotions::route('/create'),
            'view' => Pages\ViewPromotions::route('/{record}'),
            'edit' => Pages\EditPromotions::route('/{record}/edit'),
        ];
    }
}
