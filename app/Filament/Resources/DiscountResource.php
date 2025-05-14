<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Discount;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\Split;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Pages\SubNavigationPosition;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Filament\Forms\Components\DateTimePicker;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Group as InfoG;
use App\Filament\Resources\DiscountResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components\Section as InfoSec;
use App\Filament\Resources\DiscountResource\RelationManagers;
use App\Filament\Resources\DiscountResource\Pages\ViewDiscount;
use App\Filament\Resources\DiscountResource\RelationManagers\ProductsRelationManager;

class DiscountResource extends Resource
{
    protected static ?string $model = Discount::class;

    protected static ?string $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-percent-badge';

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                ->schema([
                    TextInput::make('discount_name')
                    ->required()
                    ->maxLength(255)
                    ->unique(Discount::class, 'discount_name', ignoreRecord: true)
                    ->live(onBlur: true)
                    ->label('Discount Name')
                    ->afterStateUpdated(fn (string $state, Forms\Set $set) => $set('discount_slug', Str::slug($state))),

                    TextInput::make('discount_slug')
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->maxLength(255)
                    ->unique(Discount::class, 'discount_slug', ignoreRecord: true)
                    ->label('Slug'),

                    RichEditor::make('discount_desc')
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
                        ->label('Starts At')
                        ->minDate(now()->addDay()->startOfDay())
                        ->maxDate(now()->addDay()->endOfDay())
                        ->hoursStep(1)
                        ->minutesStep(5)
                        ->closeOnDateSelection(),

                        DateTimePicker::make('ends_at')
                        ->required()
                        ->native(false)
                        ->seconds(false)
                        ->date('F j, Y, g:i a')
                        ->label('Ends At')
                        ->minDate(now()->addDay()->startOfDay())
                        ->hoursStep(1)
                        ->minutesStep(5)
                        ->closeOnDateSelection(),


                        // DateTimePicker::make('starts_at')
                        // ->required()
                        // ->native(false)
                        // ->seconds(false)
                        // ->date('F j, Y, g:i a')
                        // ->label('Starts At'),

                        // DateTimePicker::make('ends_at')
                        // ->required()
                        // ->native(false)
                        // ->seconds(false)
                        // ->label('Ends At'),
                    ]),

                    Section::make('Banner')
                    ->description('Upload a banner image for the sale.')
                    ->schema([
                        FileUpload::make('discount_banner')
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
                ImageColumn::make('discount_banner')
                ->label('Banner')
                ->size(50)
                ->square(),

                TextColumn::make('discount_name')
                ->searchable()
                ->sortable(),

                TextColumn::make('discount_slug')
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
                ->label(__('New Discount')),
            ])
            ->emptyStateIcon('heroicon-o-percent-badge')
            ->emptyStateHeading('No discounts are created')
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            ProductsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDiscounts::route('/'),
            'create' => Pages\CreateDiscount::route('/create'),
            'edit' => Pages\EditDiscount::route('/{record}/edit'),
            'view' => ViewDiscount::route('/{record}')
        ];
    }

    // View Page Info lists ni sa
    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\ViewDiscount::class,
            // Pages\EditDiscount::class,
        ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfoSec::make()
                ->schema([
                    InfoG::make([

                        Split::make([
                            InfoG::make([
                                ImageEntry::make('discount_banner')
                                ->hiddenlabel()
                                ->size(200)
                            ])
                            ->grow(false),

                            InfoG::make([

                                TextEntry::make('discount_name')
                                ->label('Discount')
                                ->size(TextEntry\TextEntrySize::Large)
                                ->weight(FontWeight::Bold)
                                ->columnSpanFull(),

                                TextEntry::make('starts_at')
                                ->date('F j, Y, g:i a')
                                ->badge()
                                ->color('success'),

                                TextEntry::make('ends_at')
                                ->date('F j, Y, g:i a')
                                ->badge()
                                ->color('danger'),
                            ])
                            ->columns([
                                'sm' => 1,
                                'md' => 2,
                                'lg' => 2
                            ])
                        ])
                        ->from('md')

                    ])
                    ->columnSpanfull(),

                    TextEntry::make('discount_desc')
                    ->label('Description')
                    ->markdown()
                    ->columnSpanFull(),
                ])
            ]);
    }

}
