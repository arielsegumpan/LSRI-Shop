<?php

namespace App\Filament\Admin\Resources\ProductCategoryResource\Pages;

use App\Filament\Admin\Resources\ProductCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductCategory extends CreateRecord
{
    protected static string $resource = ProductCategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['prod_cat_name'] = ucwords($data['prod_cat_name']);
        $data['prod_cat_slug'] = strtoupper($data['prod_cat_slug']);
        $data['prod_cat_desc'] = ucfirst($data['prod_cat_desc']);
        return $data;
    }
}
