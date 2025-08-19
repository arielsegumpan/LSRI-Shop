<?php

namespace App\Filament\Admin\Resources\ServiceRequestResource\Pages;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\ServiceRequestResource;

class CreateServiceRequest extends CreateRecord
{

    protected static string $resource = ServiceRequestResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }

}
