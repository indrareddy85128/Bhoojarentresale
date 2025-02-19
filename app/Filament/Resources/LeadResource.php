<?php

namespace App\Filament\Resources;

use App\Filament\Exports\LeadExporter;
use App\Filament\Resources\LeadResource\Pages;
use App\Filament\Resources\LeadResource\RelationManagers\DailyUpdatesRelationManager;
use App\Models\Lead;
use App\Models\User;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Faker\Provider\ar_EG\Text;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Actions\ExportAction;

class LeadResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Lead::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    public static function canCreate(): bool
    {
        return Auth::user()->hasRole('super_admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required()->visible(fn() => Auth::user()->hasRole('super_admin')),
                TextInput::make('phone')->label('phone')
                    ->required()->visible(fn() => Auth::user()->hasRole('super_admin')),
                TextInput::make('email')
                    ->label('Email')
                    ->required()->visible(fn() => Auth::user()->hasRole('super_admin')),
                Select::make('lead_source')
                    ->label('Lead Source')
                    ->options([
                        'Available Flats' => 'Available Flats',
                        'Resale' => 'Resale',
                        'Rent' => 'Rent',
                        'Loans' => 'Loans',
                        'Insurance' => 'Insurance',
                        'Used Cars' => 'Used Cars',
                        'Contact Us' => 'Contact Us',
                    ])
                    ->default('Website')
                    ->required()->visible(fn() => Auth::user()->hasRole('super_admin')),
                Textarea::make('message')->columnSpan('full')->visible(fn() => Auth::user()->hasRole('super_admin')),
                Select::make('lead_status')
                    ->label('Status')
                    ->options([
                        'Open' => 'Open',
                        'Pending' => 'Pending',
                        'Completed' => 'Completed',
                        'Lost' => 'Lost',
                        'Rejected' => 'Rejected',
                    ])
                    ->default('Open')
                    ->required(),

                Select::make('user_id')
                    ->label('Telecaller')
                    ->options(User::role('telecaller')->pluck('name', 'id'))
                    // ->required()
                    ->visible(fn() => Auth::user()->hasRole('super_admin'))
                    ->afterStateUpdated(function ($get) {
                        $recipient = User::find($get('user_id'));

                        Notification::make()
                            ->title('New Lead Assigned')
                            ->body('You have a new lead assigned by admin.')
                            ->sendToDatabase($recipient);
                    }),

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
                TextEntry::make('message'),
                Section::make('Telecaller Information')
                    ->schema([
                        TextEntry::make('Telecaller')
                            ->label('Assigned Telecaller')
                            ->state(fn($record) => $record->user ? $record->user->name : 'No Telecaller Assigned'),
                    ]),

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

                            TextEntry::make('Resale Type')
                                ->label('Resale Type')
                                ->visible(fn($record) => !empty($formData['resale_options']))
                                ->state(function () use ($formData) {
                                    $resaleOption = $formData['resale_options'] ?? 'N/A';

                                    return is_string($resaleOption)
                                        ? ucfirst($resaleOption)
                                        : 'N/A';
                                }),

                            TextEntry::make('Rent Type')
                                ->label('Rent Type')
                                ->visible(fn($record) => !empty($formData['rent_options']))
                                ->state(function () use ($formData) {
                                    $rentOption = $formData['rent_options'] ?? 'N/A';

                                    return is_string($rentOption)
                                        ? ucfirst($rentOption)
                                        : 'N/A';
                                }),
                            TextEntry::make('Loan Type')
                                ->label('Loan Type')
                                ->visible(fn($record) => !empty($formData['loan_options']))
                                ->state(function () use ($formData) {
                                    $rentOption = $formData['loan_options'] ?? 'N/A';

                                    return is_string($rentOption)
                                        ? ucfirst($rentOption)
                                        : 'N/A';
                                }),
                            TextEntry::make('Insurance Type')
                                ->label('Insurance Type')
                                ->visible(fn($record) => !empty($formData['insurance_options']))
                                ->state(function () use ($formData) {
                                    $rentOption = $formData['insurance_options'] ?? 'N/A';

                                    return is_string($rentOption)
                                        ? ucfirst($rentOption)
                                        : 'N/A';
                                }),

                            TextEntry::make('Car Make/Model')
                                ->label('Car Make/Model')
                                ->visible(fn($record) => !empty($formData['car_make_model']))
                                ->state(function () use ($formData) {
                                    $rentOption = $formData['car_make_model'] ?? 'N/A';

                                    return is_string($rentOption)
                                        ? ucfirst($rentOption)
                                        : 'N/A';
                                }),
                            TextEntry::make('Car Manufacturing Year')
                                ->label('Car Manufacturing Year')
                                ->visible(fn($record) => !empty($formData['manufacturing_year']))
                                ->state(function () use ($formData) {
                                    $rentOption = $formData['manufacturing_year'] ?? 'N/A';

                                    return is_string($rentOption)
                                        ? ucfirst($rentOption)
                                        : 'N/A';
                                }),
                            TextEntry::make('Kilometers')
                                ->label('Kilometers')
                                ->visible(fn($record) => !empty($formData['kilometers']))
                                ->state(function () use ($formData) {
                                    $rentOption = $formData['kilometers'] ?? 'N/A';

                                    return is_string($rentOption)
                                        ? ucfirst($rentOption)
                                        : 'N/A';
                                }),

                            TextEntry::make('Car Number')
                                ->label('Car Number')
                                ->visible(fn($record) => !empty($formData['car_number']))
                                ->state(function () use ($formData) {
                                    $carNumber = $formData['car_number'] ?? '';
                                    // Check if carNumber is numeric before applying number_format
                                    return is_numeric($carNumber) ? number_format($carNumber) : $carNumber;
                                }),

                            TextEntry::make('Salary per Month')
                                ->label('Salary per Month')
                                ->visible(fn($record) => !empty($formData['salary_per_month']))
                                ->state(function () use ($formData) {
                                    return number_format($formData['salary_per_month'] ?? 0);
                                }),

                            TextEntry::make('Loan Amount')
                                ->label('Loan Amount')
                                ->visible(fn($record) => !empty($formData['loan_amount']))
                                ->state(function () use ($formData) {
                                    return number_format($formData['loan_amount'] ?? 0);
                                }),
                            TextEntry::make('Mortgage Loan Type')
                                ->label('Mortgage Loan Type')
                                ->visible(fn($record) => !empty($formData['mortgage_loan_options']))
                                ->state(function () use ($formData) {
                                    $rentOption = $formData['mortgage_loan_options'] ?? 'N/A';

                                    return is_string($rentOption)
                                        ? ucfirst($rentOption)
                                        : 'N/A';
                                }),


                            TextEntry::make('Flat Size')
                                ->label('Flat Size')
                                ->visible(fn($record) => !empty($formData['flat_details']))
                                ->state(function () use ($formData) {
                                    if (! isset($formData['flat_details'])) {
                                        return 'N/A';
                                    }

                                    $flatSize = $formData['flat_details'];

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

                            TextEntry::make('Furnished Status')
                                ->label('Furnished Status')
                                ->visible(fn($record) => !empty($formData['furnished_type']))
                                ->state(function () use ($formData) {
                                    if (! isset($formData['furnished_type'])) {
                                        return 'N/A';
                                    }
                                    $furnished = $formData['furnished_type'];
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

                            TextEntry::make('Used Car Loan Options')
                                ->label('Used Car Loan Options')
                                ->visible(fn($record) => !empty($formData['sub_loan_options']))
                                ->state(function () use ($formData) {
                                    if (! isset($formData['sub_loan_options'])) {
                                        return 'N/A';
                                    }
                                    $furnished = $formData['sub_loan_options'];
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

                            TextEntry::make('Sub Mortgage Loan Options')
                                ->label('Sub Mortgage Loan Options')
                                ->visible(fn($record) => !empty($formData['sub_mortgage_loan_options']))
                                ->state(function () use ($formData) {
                                    if (! isset($formData['sub_mortgage_loan_options'])) {
                                        return 'N/A';
                                    }
                                    $furnished = $formData['sub_mortgage_loan_options'];
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
        $query = Lead::query();

        // Check if the user is a telecaller
        if (Auth::user()->hasRole('telecaller')) {
            $query->where('user_id', Auth::id());
        }

        return $table

            ->query($query->orderBy('id', 'desc'))
            ->columns([
                TextColumn::make('index')
                    ->label('Sl.no')
                    ->rowIndex(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('phone')->searchable(),
                TextColumn::make('lead_source'),
                TextColumn::make('lead_status')->label('Status'),

            ])
            ->filters([
                SelectFilter::make('lead_source')
                    ->options(Lead::pluck('lead_source', 'lead_source')->toArray()),
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })

            ])
            ->actions([
                Action::make('Document')
                    ->icon('heroicon-o-identification')
                    ->action(function ($record) {
                        return redirect(asset(Storage::url($record->document)));
                    })->visible(fn($record) => ! is_null($record->document)),
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(LeadExporter::class)
            ]);;
    }

    public static function getRelations(): array
    {
        return [
            DailyUpdatesRelationManager::class,
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

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',

        ];
    }
}
