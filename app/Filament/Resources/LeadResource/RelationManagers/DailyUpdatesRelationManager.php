<?php

namespace App\Filament\Resources\LeadResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DailyUpdatesRelationManager extends RelationManager
{
    protected static string $relationship = 'dailyUpdates';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('update_type')
                    ->required()
                    ->options([
                        'call' => 'Call',
                        'email' => 'Email',
                        'meeting' => 'Meeting',
                        // Add more options as needed
                    ]),

                Textarea::make('comment')
                    ->nullable()
                    ->maxLength(500), // Adjust max length as needed

                DatePicker::make('next_call_date')
                    ->nullable()
                    ->native(false)
                    ->label('Next Call Date'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('update_type')
                    ->label('Update Type'),

                TextColumn::make('comment')
                    ->label('Comment'),
                TextColumn::make('next_call_date')
                    ->label('Next Call Date')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('Y-m-d')),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
