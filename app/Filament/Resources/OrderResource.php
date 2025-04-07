<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Enums\OrderStatusEnum;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ToggleButtons;
use App\Filament\Resources\OrderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderResource\RelationManagers;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

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



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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



            TextInput::make('order_total_price')
                ->label('Total Price')
                ->numeric()
                ->dehydrated()
                ->required()
                ->maxLength(12)
                ->default(0)
                ->placeholder('0.00'),

            TextInput::make('order_currency')
                ->label('Currency')
                ->dehydrated()
                ->required()
                ->maxLength(3)
                ->default('PHP'),

            TextInput::make('shipping_method')
                ->label('Shipping Method')
                ->dehydrated()
                ->required()
                ->maxLength(32)
                ->default('Standard Shipping')
                ->placeholder('Standard Shipping'),

            TextInput::make('shipping_price')
                ->label('Shipping Price')
                ->numeric()
                ->dehydrated()
                ->required()
                ->maxLength(12)
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
                ->placeholder('Any special instructions or notes for the order')
        ];
    }
}
