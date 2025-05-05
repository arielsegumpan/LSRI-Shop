<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Enums\OrderStatusEnum;
use App\Enums\PaymentMethodEnum;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use App\Forms\Components\AddressForm;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ToggleButtons;
use App\Filament\Resources\OrderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderResource\RelationManagers;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Shop';

    // protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                    ->schema(static::getDetailsFormSchema()),

                Section::make()
                    ->schema([
                        static::getOrderItemsRepeater(),
                    ])



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')
                ->label('Order #')
                ->sortable()
                ->searchable()
                ->badge()
                ->color('primary'),

                TextColumn::make('user.name')
                ->label('Customer')
                ->sortable()
                ->searchable(),

                TextColumn::make('order_status')
                ->label('Status')
                ->sortable()
                ->searchable()
                ->badge(),

                TextColumn::make('created_at')
                ->label('Order Date')
                ->sortable()
                ->searchable()
                ->dateTime('F d, Y  - g:i A'),

                TextColumn::make('payment_method')
                ->label('Payment Method')
                ->sortable()
                ->searchable()
                ->badge(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('order_status')
                    ->options(OrderStatusEnum::class),
                Tables\Filters\SelectFilter::make('payment_method')
                    ->options(PaymentMethodEnum::class),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])->tooltip('Actions')
            ])
            ->bulkActions([

            ])
            ->deferLoading()
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                ->icon('heroicon-m-plus')
                ->label(__('New Order')),
            ])
            ->emptyStateIcon('heroicon-o-shopping-cart')
            ->emptyStateHeading('No Orders are created')
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    /** @return Forms\Components\Component[] */
    public static function getDetailsFormSchema(): array
    {
        return [

            Fieldset::make('Order Details')
                ->schema([
                    TextInput::make('order_number')
                    ->label('Order #')
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->maxLength(32)
                    ->default('#ORDER-'. date('His-') . strtoupper(Str::random(6)))
                    ->unique(Order::class, 'order_number', ignoreRecord: true),

                Select::make('user_id')
                    ->label('Customer')
                    ->relationship('user', 'name')
                    ->preload()
                    ->optionsLimit(6)
                    ->native(false)
                    ->searchable()
                    ->getOptionLabelFromRecordUsing(fn ($record) => ucwords($record->name)),

                ToggleButtons::make('shipping_method')
                    ->label('Shipping Method')
                    ->options(PaymentMethodEnum::class)
                    ->inline()
                    ->dehydrated()
                    ->default(PaymentMethodEnum::COD),

                TextInput::make('shipping_price')
                    ->label('Shipping Price')
                    ->numeric()
                    ->dehydrated()
                    ->required()
                    ->default(0)
                    ->placeholder('0.00'),

                ToggleButtons::make('order_status')
                    ->inline()
                    ->options(OrderStatusEnum::class)
                    ->default(OrderStatusEnum::New)
                    ->dehydrated()
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('order_notes')
                    ->label('Notes')
                    ->maxLength(1500)
                    ->columnSpanFull()
                    ->rows(5)
                    ->placeholder('Any special instructions or notes for the order'),
                ]),


            Fieldset::make('Address')
                ->schema([
                    AddressForm::make('address')
                    ->relationship('address')
                    ->columnSpanFull(),

                ]),
        ];
    }


    public static function getOrderItemsRepeater(): Repeater
    {
        return Repeater::make('orderItems')
            ->relationship()
            ->schema([

                Select::make('product_id')
                    ->label('Product')
                    ->relationship('product', 'prod_name')
                    ->preload()
                    ->optionsLimit(6)
                    ->native(false)
                    ->searchable()
                    ->reactive()
                    ->getOptionLabelFromRecordUsing(fn ($record) => ucwords($record->prod_name))
                    ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('unit_price', Product::find($state)?->prod_price ?? 0))
                    ->distinct()
                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                    ->required(),

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

                TextInput::make('unit_price')
                    ->label('Unit Price')
                    ->numeric()
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->default(0)
                    ->reactive()
                    ->afterStateUpdated(function ($state, Forms\Set $set, Forms\Get $get) {
                        $set('subtotal', $state * $get('unit_price'));
                    }),

                TextInput::make('subtotal')
                    ->label('Subtotal')
                    ->numeric()
                    ->dehydrated()
                    ->required()
                    ->default(0.00)
                    ->placeholder('0.00')
                    ->readOnly(),

            ])
            ->columns([
                'sm' => 1,
                'md' => 2,
                'lg' => 4
            ])
            ->defaultItems(1);
    }
}
