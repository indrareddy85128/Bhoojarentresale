<?php

namespace App\Filament\Resources\AvailableflatsResource\Pages;

use App\Filament\Resources\AvailableflatsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAvailableflats extends EditRecord
{
    protected static string $resource = AvailableflatsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
