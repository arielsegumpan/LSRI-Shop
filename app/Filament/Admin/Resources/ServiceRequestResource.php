<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Enums\VehicleTypeEnum;
use App\Models\ServiceRequest;
use Filament\Resources\Resource;
use Spatie\Permission\Models\Role;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\ToggleButtons;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\ServiceRequestResource\Pages;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use App\Filament\Admin\Resources\ServiceRequestResource\RelationManagers;

class ServiceRequestResource extends Resource
{
    protected static ?string $model = ServiceRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell-alert';

     protected static ?string $navigationGroup = 'Services';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Wizard::make([
                    Step::make('Service Request Details')
                    ->icon('heroicon-o-shopping-bag')
                    ->completedIcon('heroicon-m-check-badge')
                    ->description('Enter the service request details.')
                    ->schema([
                        Split::make([
                            Group::make([

                                Section::make()
                                    ->schema([

                                        Group::make()
                                        ->schema([
                                            Select::make('user_id')
                                            ->relationship(
                                                name: 'customer',
                                                ignoreRecord: true,
                                                modifyQueryUsing: fn (Builder $query) => $query->whereHas('roles', fn ($q) => $q->where('name', 'customer'),
                                                ),
                                            )
                                            ->getOptionLabelFromRecordUsing(fn (Model $record) => ucwords($record->name) ?? '')
                                            ->searchable('name')
                                            ->preload()
                                            ->required()
                                            ->native(false)
                                            ->searchable()
                                            ->optionsLimit(6)
                                            ->createOptionForm([
                                                Split::make([
                                                    Section::make('User Details')
                                                    ->description('The user\'s name and email address.')
                                                    ->schema([

                                                        Group::make()
                                                        ->schema([
                                                            TextInput::make('name')
                                                            ->required()
                                                            ->maxLength(255),

                                                            TextInput::make('email')
                                                            ->required()
                                                            ->email()
                                                            ->unique(ignoreRecord: true),
                                                        ])
                                                        ->columns([
                                                            'sm' => 1,
                                                            'md' => 2,
                                                            'lg' => 2
                                                        ]),

                                                        TextInput::make('password')
                                                        ->password()
                                                        ->revealable()
                                                        ->dehydrateStateUsing(fn ($state) => bcrypt($state))
                                                        ->required(fn (Page $livewire): bool => $livewire instanceof Pages\EditUser),
                                                        // ->visible(fn (Page $livewire): bool => $livewire instanceof Pages\CreateUser),

                                                        TextInput::make('password_confirmation')
                                                        ->label('Confirm Password')
                                                        ->password()
                                                        ->revealable()
                                                        ->required(fn (Page $livewire): bool => $livewire instanceof Pages\EditUser),
                                                        // ->visible(fn (Page $livewire): bool => $livewire instanceof Pages\CreateUser),
                                                    ])
                                                    ->columns(1),

                                                ])
                                                ->columns([
                                                    'sm' => 1,
                                                    'md' => 2,
                                                ])
                                                ->columnSpanFull(),

                                                Section::make('Roles')
                                                ->description('Select roles for this user')
                                                ->schema([

                                                    CheckboxList::make('roles')
                                                    ->label('Select Roles')
                                                    ->relationship(name: 'roles', titleAttribute: 'name')
                                                    ->searchable()
                                                    ->columns(2)
                                                    ->options(function () {
                                                        return Role::all()->mapWithKeys(function ($role) {
                                                            return [$role->id => Str::replace('_', ' ', Str::ucwords($role->name))];
                                                        });
                                                    })

                                                ])->columnSpanFull()

                                            ]),

                                            Select::make('vehicle_type')
                                            ->label('Vehicle Type')
                                            ->options(VehicleTypeEnum::class)
                                            ->required()
                                            ->native(false),
                                        ])
                                        ->columns([
                                            'sm' => 1,
                                            'md' => 2,
                                            'lg' => 2
                                        ]),

                                        Select::make('mechanic_id')
                                        ->label('Mechanic')
                                        ->required()
                                        ->relationship(
                                            name: 'mechanic',
                                            ignoreRecord: true,
                                            modifyQueryUsing: fn (Builder $query) => $query->whereHas('roles', fn ($q) => $q->where('name', 'mechanic')),
                                        )
                                        ->getOptionLabelFromRecordUsing(fn (Model $record) => ucwords($record->name) ?? '')
                                        ->preload()
                                        ->optionsLimit(6)
                                        ->native(false)
                                        ->searchable()
                                        ->createOptionForm([
                                            Split::make([
                                                Section::make('Mechanic user details')
                                                    ->description('The user\'s name and email address.')
                                                    ->schema([
                                                        Group::make()
                                                            ->schema([
                                                                TextInput::make('name')
                                                                    ->required()
                                                                    ->maxLength(255),

                                                                TextInput::make('email')
                                                                    ->required()
                                                                    ->email()
                                                                    ->unique(ignoreRecord: true),
                                                            ])
                                                            ->columns([
                                                                'sm' => 1,
                                                                'md' => 2,
                                                                'lg' => 2
                                                            ]),

                                                        TextInput::make('password')
                                                            ->password()
                                                            ->revealable()
                                                            ->dehydrateStateUsing(fn ($state) => bcrypt($state))
                                                            ->required(),

                                                        TextInput::make('password_confirmation')
                                                            ->label('Confirm Password')
                                                            ->password()
                                                            ->revealable()
                                                            ->required()
                                                            ->same('password'),
                                                    ])
                                                    ->columns(1),
                                            ])
                                            ->columns([
                                                'sm' => 1,
                                                'md' => 2,
                                            ])
                                            ->columnSpanFull(),
                                        ])
                                        ->createOptionUsing(function (array $data): Model {
                                            // Create the user
                                            $user = \App\Models\User::create([
                                                'name' => $data['name'],
                                                'email' => $data['email'],
                                                'password' => bcrypt($data['password']),
                                            ]);

                                            // Automatically assign the mechanic role
                                            $user->assignRole('mechanic');

                                            return $user;
                                        }),
                                    ]),

                                Section::make()
                                    ->schema([
                                        RichEditor::make('remarks')
                                        ->required()
                                        ->maxLength(65535)
                                    ])

                            ]),
                            Section::make([
                                DatePicker::make('requested_date')
                                    ->native(false)
                                    ->required()
                                    ->prefixIcon('heroicon-o-calendar')
                                    ->dehydrated()
                                    ->default(now())
                                    ->disabled(),
                                DatePicker::make('scheduled_date')
                                    ->native(false)
                                    ->required()
                                    ->prefixIcon('heroicon-o-calendar-date-range')
                                    ->minDate(now())
                                    ->maxDate(now()->addYears(3))
                                    ->dehydrated(),

                                ToggleButtons::make('status')
                                    ->label('Status')
                                    ->boolean()
                                    ->inline()
                                    ->dehydrated()
                                    ->default(1)
                            ])->grow(false),

                        ])
                        ->columnSpanFull()
                        ->from('md')
                    ]),

                    Step::make('Request Items')
                    ->icon('heroicon-o-shopping-cart')
                    ->completedIcon('heroicon-m-check-badge')
                    ->description('Add Items to the Request')
                    ->schema([
                        Section::make()
                        ->schema([
                            Repeater::make('serviceRequestItems')
                            ->relationship('serviceRequestItems')
                            ->schema([

                                Select::make('service_id')
                                    ->relationship('service', 'name')
                                    ->required()
                                    ->searchable()
                                    ->native(false)
                                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->name),

                                TextInput::make('quantity')
                                    ->label('Quantity')
                                    ->numeric()
                                    ->dehydrated()
                                    ->required()
                                    ->maxLength(12)
                                    ->default(0)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, Forms\Set $set, Forms\Get $get) {
                                        $set('subtotal', $state * $get('unit_price'));
                                    }),

                                // TextInput::make('unit_price')
                                //     ->label('Unit Price')
                                //     ->numeric()
                                //     ->disabled()
                                //     ->dehydrated()
                                //     ->required()
                                //     ->default(0)
                                //     ->reactive()
                                //     ->afterStateUpdated(function ($state, Forms\Set $set, Forms\Get $get) {
                                //         $set('subtotal', $state * $get('unit_price'));
                                //     }),

                                TextInput::make('subtotal_price')
                                    ->label('Subtotal')
                                    ->numeric()
                                    ->dehydrated()
                                    ->required()
                                    ->default(0.00)
                                    ->placeholder('0.00')
                                    ->readOnly(),
                            ])
                        ])
                    ])

                ])
                ->skippable(false)
                ->contained(false)
                ->columnspanFull()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('customer.name')
                ->sortable()
                ->searchable(),

                TextColumn::make('mechanic.name')
                ->sortable()
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])->tooltip('Actions')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->deferLoading()
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                ->icon('heroicon-m-plus')
                ->label(__('Create Service Request')),
            ])
            ->emptyStateIcon('heroicon-o-bell-alert')
            ->emptyStateHeading('No Service Requests are created');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServiceRequests::route('/'),
            'create' => Pages\CreateServiceRequest::route('/create'),
            'edit' => Pages\EditServiceRequest::route('/{record}/edit'),
        ];
    }
}
