<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\ProductResource;
use Illuminate\Contracts\Support\Htmlable;

class ViewProduct extends ViewRecord
{
    protected static string $resource = ProductResource::class;

    public function getTitle(): string | Htmlable
    {
        /** @var Product */
        $record = $this->getRecord();

        return ucwords($record->prod_name . ': (' . $record->prod_sku .')');
    }

    protected function getActions(): array
    {
        return [];
    }
}
