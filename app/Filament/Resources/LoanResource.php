<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LoanResource\Pages;
use App\Filament\Resources\LoanResource\RelationManagers;
use App\Models\Loan;
use Filament\Forms;
use Filament\Tables\Actions\Action;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class LoanResource extends Resource
{
    protected static ?string $model = Loan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
        return
            false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                    ->label('Sl.no')
                    ->rowIndex(),
                TextColumn::make('loan'),
                TextColumn::make('loan_options'),
                TextColumn::make('options'),
                TextColumn::make('name'),
                TextColumn::make('phone'),
                TextColumn::make('email'),
                TextColumn::make('car_number'),
                TextColumn::make('salary_per_month'),
                TextColumn::make('loan_amount'),
                TextColumn::make('message'),
                TextColumn::make('authorise'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('View RC')
                    ->icon('heroicon-o-identification')
                    ->action(function ($record) {
                        return redirect(asset(Storage::url($record->rc_copy)));
                    })->visible(fn($record) => ! is_null($record->rc_copy)),
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
            'index' => Pages\ListLoans::route('/'),
        ];
    }
}
