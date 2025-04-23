<?php

namespace App\Forms\Components;

use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Woenel\Prpcmblmts\Philippines;


class AddressForm extends Forms\Components\Field
{

    protected string $view = 'filament-forms::components.group';

    /** @var string|callable|null */
    public $relationship = null;

    public function relationship(string | callable $relationship): static
    {
        $this->relationship = $relationship;

        return $this;
    }

    public function saveRelationships(): void
    {
        $state = $this->getState();
        $record = $this->getRecord();
        $relationship = $record?->{$this->getRelationship()}();

        if ($relationship === null) {
            return;
        } elseif ($address = $relationship->first()) {
            $address->update($state);
        } else {
            $relationship->updateOrCreate($state);
        }

        $record?->touch();
    }

    public function getChildComponents(): array
    {
        $philippines = new Philippines;

        // dd($philippines->regions()->pluck('name', 'id'));
        return [
            Forms\Components\Grid::make()
                ->schema([
                    Forms\Components\Select::make('region_id')
                        ->label('Region')
                        ->searchable()
                        ->getSearchResultsUsing(fn (string $query) => $philippines->regions()->where('name', 'like', "%{$query}%")->pluck('name', 'code'))
                        ->getOptionLabelUsing(fn ($value): ?string => $philippines->regions()->firstWhere('code', $value)?->getAttribute('name'))
                        ->native(false)
                        ->optionsLimit(6)
                        ->preload()
                        ->placeholder('Search Region (ex. Region III)')
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (callable $set) => $set('province_id', null)),

                    Forms\Components\Select::make('province_id')
                        ->label('Province')
                        ->searchable()
                        ->preload()
                        ->optionsLimit(6)
                        ->options(function (callable $get) use ($philippines) {
                            $regionId = $get('region_id');

                            if (!$regionId) {
                                return [];
                            }

                            return $philippines->provinces()
                                ->where('region_code', $regionId)
                                ->pluck('name', 'code');
                        })
                        ->placeholder('Select a region first')
                        ->live(onBlur: true)
                        ->disabled(fn (callable $get) => !$get('region_id'))
                        ->native(false)
                        ->afterStateUpdated(fn (callable $set) => $set('city_id', null)),

                    Forms\Components\Select::make('city_id')
                        ->label('City/Municipality')
                        ->searchable()
                        ->preload()
                        ->optionsLimit(6)
                        ->options(function (callable $get) use ($philippines) {
                            $provinceId = $get('province_id');

                            if (!$provinceId) {
                                return [];
                            }

                            return $philippines->cities()
                                ->where('province_code', $provinceId)
                                ->pluck('name', 'code');
                        })
                        ->placeholder('Select a province first')
                        ->native(false)
                        ->disabled(fn (callable $get) => !$get('province_id'))
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (callable $set) => $set('barangay_id', null)),

                    Forms\Components\Select::make('barangay_id')
                        ->label('Barangay')
                        ->searchable()
                        ->preload()
                        ->optionsLimit(6)
                        ->options(function (callable $get) use ($philippines) {
                            $cityId = $get('city_id');

                            if (!$cityId) {
                                return [];
                            }

                            return $philippines->barangays()
                                ->where('city_code', $cityId)
                                ->pluck('name', 'id');
                        })
                        ->placeholder('Select a city/municipality first')
                        ->native(false)
                        ->disabled(fn (callable $get) => !$get('city_id'))

                ]),

        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->afterStateHydrated(function (AddressForm $component, ?Model $record) {
            $address = $record?->getRelationValue($this->getRelationship());

            $component->state($address ? $address->toArray() : [
                'region_id' => null,
                'province_id' => null,
                'city_id' => null,
                'barangay_id' => null,
                'street' => null,
            ]);
        });

        $this->dehydrated(false);
    }

    public function getRelationship(): string
    {
        return $this->evaluate($this->relationship) ?? $this->getName();
    }
}
