<?php

namespace App\Filament\Resources\AvailableflatfromResource\Pages;

use App\Filament\Resources\AvailableflatfromResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAvailableflatfrom extends EditRecord
{
    protected static string $resource = AvailableflatfromResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
