<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AvailableflatsResource\Pages;
use App\Filament\Resources\AvailableflatsResource\RelationManagers;
use App\Models\Availableflats;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class AvailableflatsResource extends Resource
{
    protected static ?string $model = Availableflats::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->disk('public')
                    ->directory('availableflats')->required()->columnSpan('full'),
                TextInput::make('name')->required()->columnSpan('full'),
                Select::make('type')
                    ->options([
                        'rent' => 'rent',
                        'sale' => 'sale',
                    ])->required()
                    ->native(false),
                TextInput::make('bedroom')->required(),
                TextInput::make('bathroom')->required(),
                TextInput::make('sft')->required(),
                RichEditor::make('content')->required()->columnSpan('full'),
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
                TextColumn::make('name'),
                TextColumn::make('type'),
                TextColumn::make('bedroom'),
                TextColumn::make('bathroom'),
                TextColumn::make('sft'),
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
            'index' => Pages\ListAvailableflats::route('/'),
            'create' => Pages\CreateAvailableflats::route('/create'),
            'edit' => Pages\EditAvailableflats::route('/{record}/edit'),
        ];
    }
}
