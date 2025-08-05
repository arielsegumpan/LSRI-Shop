<?php

namespace App\Filament\Admin\Resources\DiscountResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;
use App\Filament\Admin\Resources\DiscountResource;

class ViewDiscount extends ViewRecord
{
    protected static string $resource = DiscountResource::class;

    public function getTitle(): string | Htmlable
    {
        /** @var Discount */
        $record = $this->getRecord();

        $productWithPivot = $record->products()->first();

        $discountCode= $productWithPivot ? $productWithPivot->pivot->discount_code : 'No Code';

        return ucwords($record->discount_name . ': (' . $discountCode .')');
    }


    protected function getActions(): array
    {
        return [];
    }

    protected function getHeaderActions(): array
    {
        return [

            Actions\EditAction::make(),
            Actions\ActionGroup::make([
                Actions\DeleteAction::make(),
            ])
        ];
    }
}
