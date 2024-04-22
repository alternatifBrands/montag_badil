<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;
    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'individual' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'individual')),
            'organization' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'organization')),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string
    {
        return 'User';
    }
}
