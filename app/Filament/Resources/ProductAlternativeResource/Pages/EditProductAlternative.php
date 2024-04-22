<?php

namespace App\Filament\Resources\ProductAlternativeResource\Pages;

use App\Filament\Resources\ProductAlternativeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductAlternative extends EditRecord
{
    protected static string $resource = ProductAlternativeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
