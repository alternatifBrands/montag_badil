<?php

namespace App\Filament\Resources\BrandAlternativeResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\BrandAlternativeResource;

class EditBrandAlternative extends EditRecord
{
    protected static string $resource = BrandAlternativeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('BrandAlternative updated')
            ->body('The BrandAlternative has been saved successfully.');
    }
    public function getTitle(): string
    {
        return 'BrandAlternative';
    }
}
