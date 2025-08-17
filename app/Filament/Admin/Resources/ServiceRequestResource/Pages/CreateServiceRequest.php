<?php

namespace App\Filament\Admin\Resources\ServiceRequestResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\ServiceRequestResource;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreateServiceRequest extends CreateRecord
{
    //  use HasWizard;

    protected static string $resource = ServiceRequestResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


    // public function form(Form $form): Form
    // {
    //     return parent::form($form)
    //         ->schema([
    //             Wizard::make($this->getSteps())
    //                 ->startOnStep($this->getStartStep())
    //                 ->cancelAction($this->getCancelFormAction())
    //                 ->submitAction($this->getSubmitFormAction())
    //                 ->skippable($this->hasSkippableSteps())
    //                 ->contained(false),
    //         ])
    //         ->columns(null);
    // }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }

    // /** @return Step[] */
    // protected function getSteps(): array
    // {
    //     return [
    //         Step::make('Request Details')
    //             ->icon('heroicon-o-bell-alert')
    //             ->schema([
    //                 Section::make()->schema(ServiceRequestResource::getServiceRequestDetailsFormSchema())->columns(),
    //             ]),

    //         Step::make('Request Items')
    //             ->icon('heroicon-o-wrench-screwdriver')
    //             ->schema([
    //                 Section::make()->schema([
    //                     ServiceRequestResource::getRequestItemsRepeater(),
    //                 ]),
    //             ]),
    //     ];
    // }
}
