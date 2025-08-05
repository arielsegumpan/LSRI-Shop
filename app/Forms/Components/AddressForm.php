<?php

namespace App\Forms\Components;

use Filament\Forms;
use App\Models\Address;
use Illuminate\Support\Str;
use Woenel\Prpcmblmts\Philippines;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;

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
        $philippines = new Philippines;

        $state = $this->getState();
        $record = $this->getRecord();
        $relationshipName = $this->getRelationship();

        // Check if we have a record
        if (!$record) {
            return;
        }

        // Make sure all required fields are provided
        if (empty($state['region_id']) || empty($state['province_id']) ||
            empty($state['city_id']) || empty($state['barangay_id'])) {
            throw new \Exception('Missing required address fields');
        }

        // Query region (expect code)
        $region = $philippines->regions()->where('code', $state['region_id'])->first(['id', 'name']);
        if (!$region) {
            throw new \Exception("Region not found: {$state['region_id']}");
        }

        // Query province (could be code or id)
        $province = $philippines->provinces()->where('code', $state['province_id'])->first(['id', 'name']);
        if (!$province) {
            // Try by ID as fallback
            $province = $philippines->provinces()->where('id', $state['province_id'])->first(['id', 'name']);
            if (!$province) {
                throw new \Exception("Province not found: {$state['province_id']}");
            }
        }

        // Query city (could be code or id)
        $city = $philippines->cities()->where('code', $state['city_id'])->first(['id', 'name']);
        if (!$city) {
            // Try by ID as fallback
            $city = $philippines->cities()->where('id', $state['city_id'])->first(['id', 'name']);
            if (!$city) {
                throw new \Exception("City not found: {$state['city_id']}");
            }
        }

        // Query barangay (expect ID from component)
        $barangay = $philippines->barangays()->where('id', $state['barangay_id'])->first(['id', 'name']);
        if (!$barangay) {
            throw new \Exception("Barangay not found: {$state['barangay_id']}");
        }

        // Check if we have an existing address
        $existing = null;
        if (method_exists($record, $relationshipName . 'es')) {
            $existing = $record->{$relationshipName . 'es'}()->where('address_type', 'shipping')->first();
        }

        $addressData = [
            'region_id' => $region->id,
            'province_id' => $province->id,
            'city_id' => $city->id,
            'barangay_id' => $barangay->id,
            'street' => $state['street'] ?? '',
            'address_type' => 'shipping',
            'full_address' => Str::upper($region->name . ', ' . $province->name . ', ' . $city->name . ', ' . $barangay->name . ', ' . ($state['street'] ?? '')),
        ];

        if ($existing) {
            // Update existing address
            $existing->update($addressData);
        } else {
            // Create new address and attach it to the order
            $address = Address::create($addressData);

            // Use the pivot table to create the relationship
            if (method_exists($record, $relationshipName . 'es')) {
                $record->{$relationshipName . 'es'}()->attach($address->id);
            }
        }

        $record->touch();
    }


    public function getChildComponents(): array
    {
        $philippines = new Philippines;

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
                        ->placeholder('Search Region (ex. Western Visayas)')
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
                        ->getSearchResultsUsing(function (string $search, callable $get) use ($philippines) {
                            $regionId = $get('region_id');

                            if (!$regionId) {
                                return [];
                            }

                            return $philippines->provinces()
                                ->where('region_code', $regionId)
                                ->where('name', 'like', "%{$search}%")
                                ->pluck('name', 'code');
                        })
                        ->getOptionLabelUsing(function ($value) use ($philippines) {
                            // Try to find by code first (which is what we're using for options)
                            $province = $philippines->provinces()->firstWhere('code', $value);

                            // If not found, try by ID (which might be stored in the database)
                            if (!$province) {
                                $province = $philippines->provinces()->firstWhere('id', $value);
                            }

                            return $province?->getAttribute('name') ?? $value;
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
                        ->getSearchResultsUsing(function (string $search, callable $get) use ($philippines) {
                            $provinceId = $get('province_id');

                            if (!$provinceId) {
                                return [];
                            }

                            // Fixed: Using province_code instead of province_id
                            return $philippines->cities()
                                ->where('province_code', $provinceId)
                                ->where('name', 'like', "%{$search}%")
                                ->pluck('name', 'code');
                        })
                        ->getOptionLabelUsing(function ($value) use ($philippines) {
                            // Try to find by code first (which is what we're using for options)
                            $city = $philippines->cities()->firstWhere('code', $value);

                            // If not found, try by ID (which might be stored in the database)
                            if (!$city) {
                                $city = $philippines->cities()->firstWhere('id', $value);
                            }

                            return $city?->getAttribute('name') ?? $value;
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
                        ->live(onBlur: true)
                        ->options(function (callable $get) use ($philippines) {
                            $cityId = $get('city_id');

                            if (!$cityId) {
                                return [];
                            }

                            return $philippines->barangays()
                                ->where('city_code', $cityId)
                                ->pluck('name', 'id');
                        })
                        ->getSearchResultsUsing(function (string $search, callable $get) use ($philippines) {
                            $cityId = $get('city_id');

                            if (!$cityId) {
                                return [];
                            }

                            return $philippines->barangays()
                                ->where('city_code', $cityId)
                                ->where('name', 'like', "%{$search}%")
                                ->pluck('name', 'id');
                        })
                        ->getOptionLabelUsing(function ($value) use ($philippines) {
                            return $philippines->barangays()->firstWhere('id', $value)?->getAttribute('name');
                        })
                        ->placeholder('Select a city/municipality first')
                        ->native(false)
                        ->disabled(fn (callable $get) => !$get('city_id')),

                    TextInput::make('street')
                        ->label('Street')
                        ->maxLength(255)
                        ->disabled(fn (callable $get) => !$get('barangay_id'))
                        ->columnSpanFull(),

                    Forms\Components\Hidden::make('address_type')
                        ->default('shipping'),
                ]),
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->afterStateHydrated(function (AddressForm $component, ?Model $record) {
            if (!$record) {
                $component->state([
                    'region_id' => null,
                    'province_id' => null,
                    'city_id' => null,
                    'barangay_id' => null,
                    'street' => null,
                    'address_type' => 'shipping',
                ]);
                return;
            }

            $relationshipName = $this->getRelationship();
            $address = null;

            // Try to get the address using the many-to-many relationship
            if (method_exists($record, $relationshipName . 'es')) {
                $address = $record->{$relationshipName . 'es'}()->where('address_type', 'shipping')->first();
            }

            $component->state($address ? $address->toArray() : [
                'region_id' => null,
                'province_id' => null,
                'city_id' => null,
                'barangay_id' => null,
                'street' => null,
                'address_type' => 'shipping',
            ]);
        });

        $this->dehydrated(false);
    }

    public function getRelationship(): string
    {
        return $this->evaluate($this->relationship) ?? $this->getName();
    }
}
