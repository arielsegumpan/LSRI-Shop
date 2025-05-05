<?php

namespace App\Filament\Resources\SaleResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\AttachAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('product_id')
                    ->default(fn ($record) => $record?->id),

                TextInput::make('product_name')
                    ->label('Product')
                    ->default(fn ($record) => $record?->product?->prod_name)
                    ->disabled()
                    ->dehydrated(),

                TextInput::make('prod_price')
                    ->label('Original Price')
                    ->prefix('₱')
                    ->default(fn ($record) => $record?->prod_price)
                    ->disabled()
                    ->dehydrated(false),

                Select::make('sale_price')
                    ->label('Sale Percentage')
                    ->required()
                    ->options([
                        '5' => '5%',
                        '10' => '10%',
                        '15' => '15%',
                        '20' => '20%',
                        '25' => '25%',
                        '30' => '30%',
                        '50' => '50%',
                    ])
                    ->reactive()
                    ->afterStateUpdated(function (Get $get, Set $set, $state) {
                        if ($get('product_id')) {
                            $product = Product::find($get('product_id'));
                            if ($product) {
                                $discountedPrice = $product->prod_price * (1 - (intval($state) / 100));
                                $set('discounted_price', number_format($discountedPrice, 2));
                            }
                        }
                    }),

                TextInput::make('discounted_price')
                    ->label('Price After Discount')
                    ->prefix('₱')
                    ->disabled()
                    ->dehydrated(false),

            ]);
    }


    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('prod_name')
            ->columns([

                ImageColumn::make('prod_ft_image')
                ->label('')
                ->size(50)
                ->square(),

                TextColumn::make('prod_name')
                ->label('Product')
                ->searchable()
                ->sortable(),

                TextColumn::make('prod_price')
                ->label('Price')
                ->prefix('₱ ')
                ->searchable()
                ->sortable()
                ->badge()
                ->color('success'),

                TextColumn::make('sale_price')
                ->label('Sale %')
                ->suffix(' % OFF')
                ->searchable()
                ->sortable()
                ->badge()
                ->color('danger'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make()
                ->button('Attach')
                ->color('primary')
                ->icon('heroicon-o-plus')
                ->preloadRecordSelect()
                ->multiple()
                ->label('Attach Product')
                ->form(fn (AttachAction $action): array => [
                    $action->getRecordSelect(),

                    Select::make('sale_price')
                    ->label('Sale Percentage')
                    ->required()
                    ->options([
                        '5' => '5%',
                        '10' => '10%',
                        '15' => '15%',
                        '20' => '20%',
                        '25' => '25%',
                        '30' => '30%',
                        '50' => '50%',
                    ]),
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
