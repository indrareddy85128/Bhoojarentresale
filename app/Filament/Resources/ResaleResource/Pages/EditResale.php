<?php

namespace App\Filament\Resources\ResaleResource\Pages;

use App\Filament\Resources\ResaleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResale extends EditRecord
{
    protected static string $resource = ResaleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
