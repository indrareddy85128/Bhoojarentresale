<?php

namespace App\Filament\Resources\AvailableflatfromResource\Pages;

use App\Filament\Resources\AvailableflatfromResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAvailableflatfroms extends ListRecords
{
    protected static string $resource = AvailableflatfromResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
