<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlaceResource\Pages;
use App\Filament\Resources\PlaceResource\RelationManagers;
use App\Models\Place;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlaceResource extends Resource
{
    protected static ?string $model = Place::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('latitude')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('longitude')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('offer')
                    ->required(),
                Forms\Components\TextInput::make('offer_type')
                    ->required(),
                Forms\Components\TextInput::make('house_type')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nombre_piece')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nombre_salle_eau')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('proprio_name')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('proprio_telephone')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('photo_couverture')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('ref')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('superficie')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('nombre_etage')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('place_garage')
                    ->numeric()
                    ->default(null),
                Forms\Components\Toggle::make('meuble'),
                Forms\Components\Toggle::make('ascenseur'),
                Forms\Components\Toggle::make('gym'),
                Forms\Components\Toggle::make('cuisine'),
                Forms\Components\Toggle::make('chauffe_eau'),
                Forms\Components\Toggle::make('piscine'),
                Forms\Components\Toggle::make('piscine_is_interne'),
                Forms\Components\Toggle::make('lux'),
                Forms\Components\Toggle::make('securite'),
                Forms\Components\Toggle::make('garage'),
                Forms\Components\Toggle::make('jardin'),
                Forms\Components\Toggle::make('cours_avant'),
                Forms\Components\Toggle::make('cours_arriere'),
                Forms\Components\Toggle::make('balcon_avant'),
                Forms\Components\Toggle::make('balcon_arriere'),
                Forms\Components\Toggle::make('terrqsse_avant'),
                Forms\Components\Toggle::make('terrqsse_arriere'),
                Forms\Components\Toggle::make('is_validated'),
                Forms\Components\Toggle::make('is_occupe'),
                Forms\Components\Toggle::make('is_rejected'),
                Forms\Components\TextInput::make('commune_id')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('facade_id')
                    ->required()
                    ->maxLength(36),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->searchable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->searchable(),
                Tables\Columns\TextColumn::make('offer'),
                Tables\Columns\TextColumn::make('offer_type'),
                Tables\Columns\TextColumn::make('house_type'),
                Tables\Columns\TextColumn::make('price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombre_piece')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre_salle_eau')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('proprio_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('proprio_telephone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('photo_couverture')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ref')
                    ->searchable(),
                Tables\Columns\TextColumn::make('superficie')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre_etage')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('place_garage')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('meuble')
                    ->boolean(),
                Tables\Columns\IconColumn::make('ascenseur')
                    ->boolean(),
                Tables\Columns\IconColumn::make('gym')
                    ->boolean(),
                Tables\Columns\IconColumn::make('cuisine')
                    ->boolean(),
                Tables\Columns\IconColumn::make('chauffe_eau')
                    ->boolean(),
                Tables\Columns\IconColumn::make('piscine')
                    ->boolean(),
                Tables\Columns\IconColumn::make('piscine_is_interne')
                    ->boolean(),
                Tables\Columns\IconColumn::make('lux')
                    ->boolean(),
                Tables\Columns\IconColumn::make('securite')
                    ->boolean(),
                Tables\Columns\IconColumn::make('garage')
                    ->boolean(),
                Tables\Columns\IconColumn::make('jardin')
                    ->boolean(),
                Tables\Columns\IconColumn::make('cours_avant')
                    ->boolean(),
                Tables\Columns\IconColumn::make('cours_arriere')
                    ->boolean(),
                Tables\Columns\IconColumn::make('balcon_avant')
                    ->boolean(),
                Tables\Columns\IconColumn::make('balcon_arriere')
                    ->boolean(),
                Tables\Columns\IconColumn::make('terrqsse_avant')
                    ->boolean(),
                Tables\Columns\IconColumn::make('terrqsse_arriere')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_validated')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_occupe')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_rejected')
                    ->boolean(),
                Tables\Columns\TextColumn::make('commune_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('facade_id')
                    ->searchable(),
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
            'index' => Pages\ListPlaces::route('/'),
            'create' => Pages\CreatePlace::route('/create'),
            'view' => Pages\ViewPlace::route('/{record}'),
            'edit' => Pages\EditPlace::route('/{record}/edit'),
        ];
    }
}
