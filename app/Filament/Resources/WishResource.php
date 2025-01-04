<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WishResource\Pages;
use App\Filament\Resources\WishResource\RelationManagers;
use App\Models\Wish;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WishResource extends Resource
{
    protected static ?string $model = Wish::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift-top';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                ->disk('public')
                ->directory('wish')->required()->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                ->label('Sl.no')
                ->rowIndex(),
            ImageColumn::make('image')->width(100)->height(100),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListWishes::route('/'),
            'create' => Pages\CreateWish::route('/create'),
            'edit' => Pages\EditWish::route('/{record}/edit'),
        ];
    }
}
