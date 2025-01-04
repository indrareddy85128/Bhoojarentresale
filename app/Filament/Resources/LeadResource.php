<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadResource\Pages;
use App\Models\Lead;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('lead_status')
                    ->label('Status')
                    ->options([
                        'Open' => 'Open',
                        'Contacted' => 'Contacted',
                        'Qualified' => 'Qualified',
                        'Lost' => 'Lost',
                        'Unqualified' => 'Unqualified',
                    ])
                    ->default('Open')
                    ->required(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('name'),
                TextEntry::make('email'),
                TextEntry::make('phone'),
                TextEntry::make('lead_source'),
                TextEntry::make('lead_status')->label('Status'),
                Section::make('Form Details')
                    ->schema(function (Lead $record) {
                        if (empty($record->form_data)) {
                            return [
                                TextEntry::make('no_data')
                                    ->label('No Form Data')
                                    ->state('No form data available'),
                            ];
                        }

                        $formData = is_string($record->form_data)
                            ? json_decode($record->form_data, true)
                            : $record->form_data;

                        return [
                            // Resale Options
                            TextEntry::make('Resale Type')
                                ->label('Resale Type')
                                ->state(function () use ($formData) {
                                    $resaleOption = $formData['resale_options'] ?? 'N/A';

                                    return is_string($resaleOption)
                                        ? ucfirst($resaleOption)
                                        : 'N/A';
                                }),

                            TextEntry::make('Flat Size')
                                ->label('Flat Size')
                                ->state(function () use ($formData) {
                                    if (! isset($formData['select_flat_size'])) {
                                        return 'N/A';
                                    }

                                    $flatSize = $formData['select_flat_size'];

                                    // Convert to array if it's a string
                                    $flatSizeArray = is_string($flatSize)
                                        ? [$flatSize]
                                        : (is_array($flatSize) ? $flatSize : [$flatSize]);

                                    // Filter and process
                                    return collect($flatSizeArray)
                                        ->filter() // Remove empty values
                                        ->map(function ($size) {
                                            // Additional formatting if needed
                                            return is_string($size)
                                                ? trim($size)
                                                : (string) $size;
                                        })
                                        ->implode(', ') ?: 'N/A';
                                }),

                            // Furnished Status with Flexible Handling
                            TextEntry::make('Furnished Status')
                                ->label('Furnished Status')
                                ->state(function () use ($formData) {
                                    if (! isset($formData['furnished'])) {
                                        return 'N/A';
                                    }

                                    $furnished = $formData['furnished'];

                                    // Convert to array if it's a string
                                    $furnishedArray = is_string($furnished)
                                        ? [$furnished]
                                        : (is_array($furnished) ? $furnished : [$furnished]);

                                    // Filter and process
                                    return collect($furnishedArray)
                                        ->filter() // Remove empty values
                                        ->map(function ($status) {
                                            return is_string($status)
                                                ? trim($status)
                                                : (string) $status;
                                        })
                                        ->implode(', ') ?: 'N/A';
                                }),
                        ];
                    })
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('phone')->searchable(),
                TextColumn::make('lead_source'),
                TextColumn::make('lead_status')->label('Status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
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
            'index' => Pages\ListLeads::route('/'),
            'create' => Pages\CreateLead::route('/create'),
            'edit' => Pages\EditLead::route('/{record}/edit'),
        ];
    }
}
