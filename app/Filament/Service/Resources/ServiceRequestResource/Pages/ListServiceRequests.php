<?php

namespace App\Filament\Service\Resources\ServiceRequestResource\Pages;

use App\Filament\Service\Resources\ServiceRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceRequests extends ListRecords
{
    protected static string $resource = ServiceRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->icon('heroicon-o-plus')->label('New Service Request'),
        ];
    }
}
