<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Brand;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ToggleButtons;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\BrandResource\Pages;
use App\Filament\Admin\Resources\BrandResource\RelationManagers;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make()
                        ->schema([
                            TextInput::make('brand_name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255) 
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $state, Forms\Set $set) => $set('brand_slug', Str::slug($state))),

                            TextInput::make('brand_slug')
                                ->label('Slug')
                                ->disabled()
                                ->dehydrated()
                                ->required()
                                ->maxLength(255),

                            TextInput::make('brand_website')
                                ->label('Website')
                                ->url()
                                ->required()
                                ->maxLength(255)
                                ->suffixIcon('heroicon-m-globe-alt'),

                            Textarea::make('brand_desc')
                                ->label('Description')
                                ->maxLength(65535)
                                ->minLength(10)
                                ->rows(6)
                                ->columnSpanFull()


                    ]),

                    Group::make()
                    ->schema([

                        Section::make()
                        ->schema([
                            ToggleButtons::make('is_visible')
                            ->label('Is visible to the public?')
                            ->boolean()
                            ->grouped()
                            ->default(true)
                            ->dehydrated(),
                        ]),

                        Section::make()
                            ->schema([

                                FileUpload::make('brand_image')
                                    ->image()
                                    ->hiddenLabel()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->maxSize(3048),
                        ])
                        ->collapsible()
                        ->columnSpan(1),
                    ])
                    ->columns([
                        'sm' => 1,
                        'md' => 1,
                        'lg' => 1,
                    ]),
                ])
                ->columnSpanFull()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('brand_image')
                ->label('')
                ->extraImgAttributes(['loading' => 'lazy'])
                ->square(),


                TextColumn::make('brand_name')
                ->label('Brand')
                ->searchable()
                ->sortable()
                ->formatStateUsing(fn (string $state): string => ucwords($state))
                ->description(fn (Brand $record): string => $record->brand_slug),

                TextColumn::make('brand_website')
                ->sortable()
                ->searchable()
                ->label('Website')
                ->icon('heroicon-m-globe-asia-australia')
                ->iconColor('primary')
                ->copyable(),

                TextColumn::make('brand_desc')
                ->label('Description')
                ->wrap()
                ->limit(100),


                ToggleColumn::make('is_visible')


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
                    Tables\Actions\BulkAction::make('toggle-visibility')
                    ->label('Toggle Visibility')
                    ->icon('heroicon-o-eye')
                    ->action(function (Collection $records): void {
                        $records->each(function ($record) {
                            $record->update([
                                'is_visible' => !$record->is_visible
                            ]);
                        });
                    })
                    ->deselectRecordsAfterCompletion()
                    ->requiresConfirmation()
                    ->modalIcon('heroicon-o-eye')
                    ->modalHeading('Toggle Visibility')
                    ->modalDescription('Toggle visibility is to make the selected product category(s) visible or hidden on the website.')
                    ->modalSubmitActionLabel('Yes')
                    ->color('success'),
                ]),
            ])
            ->deferLoading()
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                ->icon('heroicon-m-plus')
                ->label(__('New Brand')),
            ])
            ->emptyStateIcon('heroicon-o-flag')
            ->emptyStateHeading('No Brands are created')
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
