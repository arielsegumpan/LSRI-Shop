<?php

namespace App\Filament\Resources\DiscountResource\Pages;

use App\Filament\Resources\DiscountResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDiscount extends CreateRecord
{
    protected static string $resource = DiscountResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['discount_name'] = ucwords($data['discount_name']);
        $data['discount_slug'] = strtolower($data['discount_slug']);
        $data['discount_desc'] = ucfirst($data['discount_desc']);

        return $data;
    }
}
