<?php

namespace App\Filament\Resources\DiscountResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\AttachAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('prod_name')
                    ->required()
                    ->maxLength(255),
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

                TextColumn::make('discount_code')
                ->label('Discount Code')
                ->searchable()
                ->sortable()
                ->badge()
                ->color('warning')
                ->weight('bold')
                ->copyable(),

                TextColumn::make('prod_name')
                ->label('Product')
                ->searchable()
                ->sortable(),

                TextColumn::make('discount_value')
                ->label('Discount'),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make()
                ->slideOver()
                ->button('Attach')
                ->color('primary')
                ->icon('heroicon-o-plus')
                ->preloadRecordSelect()
                ->multiple()
                ->label('Attach Product')
                ->form(fn (AttachAction $action): array => [

                    Radio::make('discount_type')
                    ->label('Discount Type')
                    ->required()
                    ->default('percentage')
                    ->dehydrated()
                    ->inline()
                    ->inlineLabel(false)
                    ->dehydrated(false)
                    ->live()
                    ->options([
                        'fixed' => 'Fixed',
                        'percentage' => 'Percentage',
                    ])
                    ->descriptions([
                        'fixed' => 'Fixed amount',
                        'percentage' => 'Percentage',
                    ]),

                    TextInput::make('fixed_value')
                    ->label('Fixed Discount Price')
                    ->prefix('₱ ')
                    ->required()
                    ->numeric()
                    ->maxLength(6)
                    ->hidden(fn (Get $get): bool => $get('discount_type') !== 'fixed')
                    ->dehydrated(fn (Get $get): bool => $get('discount_type') === 'fixed')
                    ->afterStateUpdated(function(string $state, Forms\Set $set, Forms\Get $get) {
                        if($get('discount_type') === 'fixed') {
                            $set('discount_value', $state);
                        }
                    })
                    ->live(onBlur: true),

                    TextInput::make('percentage_value')
                    ->label('% Value')
                    ->suffix(' % OFF')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(100)
                    ->hidden(fn (Get $get): bool => $get('discount_type') !== 'percentage')
                    ->dehydrated(fn (Get $get): bool => $get('discount_type') === 'percentage')
                    ->afterStateUpdated(function(string $state, Forms\Set $set, Forms\Get $get) {
                        if($get('discount_type') === 'percentage') {
                            $set('discount_value', $state);
                        }
                    })
                    ->live(onBlur: true),

                    TextInput::make('discount_code')
                    ->label('Code')
                    ->maxLength(255)
                    ->default(fn() => $this->generateDiscountCode())
                    ->readOnly()
                    ->suffixAction(
                        Action::make('regenerateDiscountCode')
                        ->icon('heroicon-o-arrow-path')
                        ->tooltip('Generate new discount code')
                        ->action(function (Get $get, Set $set){
                            $set('discount_code', $this->generateDiscountCode());
                        })
                    )
                    ,

                    Hidden::make('discount_value')
                    ->required()
                    ->dehydrated(),

                    $action->getRecordSelect(),

                ]),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    protected static function generateDiscountCode(): string
    {
        $alpha = Str::upper(Str::random(4));
        $numeric = str_pad(random_int(0, pow(10, 2) - 1), 2, '0', STR_PAD_LEFT);

        return str_shuffle($alpha . $numeric);
    }
}
