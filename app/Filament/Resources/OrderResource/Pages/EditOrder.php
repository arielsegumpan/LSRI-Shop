<?php

namespace App\Filament\Resources\OrderResource\Pages;

use Filament\Actions;
use App\Forms\Components\AddressForm;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\OrderResource;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Process any data before saving if necessary
        return $data;
    }

    protected function afterSave(): void
    {
        // Save the address relationship using custom method to find the component
        $addressForm = $this->findAddressFormComponent($this->form->getComponents());

        if ($addressForm) {
            $addressForm->saveRelationships();
        }
    }

    /**
     * Recursively find the AddressForm component in the form
     */
    protected function findAddressFormComponent($components): ?AddressForm
    {
        foreach ($components as $component) {
            if ($component instanceof AddressForm) {
                return $component;
            }

            // If the component has children (like Grid, Fieldset, etc.)
            if (method_exists($component, 'getChildComponents') && !empty($component->getChildComponents())) {
                $found = $this->findAddressFormComponent($component->getChildComponents());
                if ($found) {
                    return $found;
                }
            }
        }

        return null;
    }
}
