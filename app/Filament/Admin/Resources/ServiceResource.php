<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Service;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\ServiceResource\Pages;
use App\Filament\Admin\Resources\ServiceResource\RelationManagers;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationGroup = 'Services';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([

                    TextInput::make('service_name')
                    ->required()
                    ->live(onBlur: true)
                    ->maxLength(255)
                    ->afterStateUpdated(fn (string $state, Forms\Set $set) => $set('service_slug', Str::slug($state ?? ''))),

                    TextInput::make('service_slug')
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->maxLength(255)
                    ->unique(Service::class, 'service_slug', ignoreRecord: true),

                    TextInput::make('service_price')
                    ->label('Price')
                    ->required()
                    ->numeric()
                    ->minValue(1),

                    TextInput::make('service_standard_labor')
                    ->label('Standard Labor')
                    ->required()
                    ->numeric()
                    ->minValue(1),

                    TextInput::make('service_warranty_period_days')
                    ->label('Warrnanty Period (Days)')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(90)
                    ->default(15)
                    ->dehydrated(),

                    RichEditor::make('service_description')
                    ->label('Description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('service_name')
                ->label('Service')
                ->searchable()
                ->sortable(),

                TextColumn::make('service_price')
                ->label('Price')
                ->searchable()
                ->sortable()
                ->badge()
                ->color('warning')
                ->money('PHP'),

                TextColumn::make('service_standard_labor')
                ->label('Standard Labor')
                ->searchable()
                ->sortable()
                ->money('PHP'),

                TextColumn::make('service_warranty_period_days')
                ->label('Warranty Period (Days)')
                ->searchable()
                ->sortable()
                ->badge()
                ->color('success')
                ->icon('heroicon-o-calendar'),

                TextColumn::make('service_description')
                ->label('Description')
                ->searchable()
                ->sortable()
                ->wrap()
                ->limit(50)
                ->toggleable(isToggledHiddenByDefault: true),
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
                ->label(__('Create Service')),
            ])
            ->emptyStateIcon('heroicon-o-wrench-screwdriver')
            ->emptyStateHeading('No Services are created');
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
