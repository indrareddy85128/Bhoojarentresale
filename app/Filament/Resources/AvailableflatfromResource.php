<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AvailableflatfromResource\Pages;
use App\Filament\Resources\AvailableflatfromResource\RelationManagers;
use App\Models\Availableflatfrom;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AvailableflatfromResource extends Resource
{
    protected static ?string $model = Availableflatfrom::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function canCreate(): bool
    {
        return
            false;
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                ->label('Sl.no')
                ->rowIndex(),
            TextColumn::make('name'),
            TextColumn::make('phone'),
            TextColumn::make('email'),
            TextColumn::make('subject'),
            TextColumn::make('authorise'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListAvailableflatfroms::route('/'),
        ];
    }
}
