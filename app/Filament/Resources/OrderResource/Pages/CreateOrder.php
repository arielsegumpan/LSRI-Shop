<?php

namespace App\Filament\Resources\OrderResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use App\Forms\Components\AddressForm;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;
use App\Filament\Resources\OrderResource;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreateOrder extends CreateRecord
{
    use HasWizard;

    protected static string $resource = OrderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


    public function form(Form $form): Form
    {
        return parent::form($form)
            ->schema([
                Wizard::make($this->getSteps())
                    ->startOnStep($this->getStartStep())
                    ->cancelAction($this->getCancelFormAction())
                    ->submitAction($this->getSubmitFormAction())
                    ->skippable($this->hasSkippableSteps())
                    ->contained(false),
            ])
            ->columns(null);
    }


    /** @return Step[] */
    protected function getSteps(): array
    {
        return [
            Step::make('Order Details')
                ->icon('heroicon-o-shopping-bag')
                ->schema([
                    Section::make()->schema(OrderResource::getDetailsFormSchema())->columns(),
                ]),

            Step::make('Order Items')
                ->icon('heroicon-o-shopping-cart')
                ->schema([
                    Section::make()->schema([
                        OrderResource::getOrderItemsRepeater(),
                    ]),
                ]),
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }

    protected function afterCreate(): void
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
