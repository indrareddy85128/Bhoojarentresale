<?php

namespace App\Filament\Resources\AvailableflatsResource\Pages;

use App\Filament\Resources\AvailableflatsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAvailableflats extends ListRecords
{
    protected static string $resource = AvailableflatsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
