<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Sale;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\SaleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SaleResource\RelationManagers;
use App\Filament\Resources\SaleResource\RelationManagers\ProductsRelationManager;

class SaleResource extends Resource
{
    protected static ?string $model = Sale::class;

    protected static ?string $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-percent-badge';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                ->schema([
                    TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->unique(Sale::class, 'name', ignoreRecord: true)
                    ->live(onBlur: true)
                    ->label('Name')
                    ->afterStateUpdated(fn (string $state, Forms\Set $set) => $set('slug', Str::slug($state))),

                    TextInput::make('slug')
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->maxLength(255)
                    ->unique(Sale::class, 'slug', ignoreRecord: true)
                    ->label('Slug'),

                    RichEditor::make('description')
                    ->required()
                    ->columnSpan('full'),
                ])
                ->columnSpan([
                    'sm' => 1,
                    'md' => 3,
                    'lg' => 3
                ]),

                Group::make([
                    Section::make()
                    ->schema([
                        DateTimePicker::make('starts_at')
                        ->required()
                        ->native(false)
                        ->seconds(false)
                        ->date('F j, Y, g:i a')
                        ->label('Starts At'),

                        DateTimePicker::make('ends_at')
                        ->required()
                        ->native(false)
                        ->seconds(false)
                        ->label('Ends At'),
                    ]),

                    Section::make('Banner')
                    ->description('Upload a banner image for the sale.')
                    ->schema([
                        FileUpload::make('sale_banner')
                        ->hiddenLabel()
                        ->required()
                        ->image()
                        ->imageEditor()
                        ->imageEditorAspectRatios([
                            '4:3',
                            '16:9',
                        ])
                        ->maxSize(3048)
                        ->label('Image'),
                    ])
                ])
                ->columnSpan([
                    'sm' => 1,
                    'md' => 2,
                    'lg' => 2
                ])

            ])
            ->columns([
                'sm' => 1,
                'md' => 5,
                'lg' => 5
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('sale_banner')
                ->label('Banner')
                ->size(50)
                ->square(),

                TextColumn::make('name')
                ->searchable()
                ->sortable(),

                TextColumn::make('slug')
                ->searchable()
                ->sortable(),

                TextColumn::make('starts_at')
                ->dateTime("F j, Y, g:i a")
                ->sortable()
                ->badge()
                ->color('success'),

                TextColumn::make('ends_at')
                ->dateTime("F j, Y, g:i a")
                ->sortable()
                ->badge()
                ->color('danger'),
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
                ->label(__('New Sale')),
            ])
            ->emptyStateIcon('heroicon-o-percent-badge')
            ->emptyStateHeading('No Sales are created')
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            ProductsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSale::route('/create'),
            'edit' => Pages\EditSale::route('/{record}/edit'),
        ];
    }
}
