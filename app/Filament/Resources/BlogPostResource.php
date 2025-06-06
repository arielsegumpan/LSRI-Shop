<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\BlogPost;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Support\Carbon;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\Split;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Pages\SubNavigationPosition;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ToggleButtons;
use Filament\Infolists\Components\TextEntry;
use Illuminate\Database\Eloquent\Collection;
use Filament\Infolists\Components\ImageEntry;
use App\Filament\Resources\BlogPostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components\Group as InfoGroup;
use Filament\Infolists\Components\Section as InfoSection;
use App\Filament\Resources\BlogPostResource\RelationManagers;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static ?string $modelLabel = 'Blogs';

    protected static ?string $navigationLabel = 'Blogs';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Posts';

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->maxLength(255)
                            ->afterStateUpdated(fn (string $state, Forms\Set $set) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255)
                            ->unique(BlogPost::class, 'slug', ignoreRecord: true),

                        RichEditor::make('content')
                            ->required()
                            ->columnSpan('full'),
                    ])
                    ->columns(2)
                    ->columnSpan(2),

                Group::make()
                ->schema([

                    Section::make()
                    ->schema([

                        ToggleButtons::make('is_visible')
                        ->label('Is visible to the public?')
                        ->boolean()
                        ->default(true)
                        ->dehydrated()
                        ->grouped(),

                        DatePicker::make('published_at')
                        ->label('Published Date')
                        ->native(false)
                        ->columnSpanFull()
                        ->default(now()),
                    ]),

                    Section::make('Featured Image')
                        ->schema([

                            FileUpload::make('featured_img')
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

                    Section::make()
                    ->schema([
                        Select::make('user_id')
                            ->label('Author')
                            ->relationship(name: 'user', titleAttribute: 'name')
                            ->searchable()
                            ->preload()
                            ->optionsLimit(6)
                            ->required()
                            ->getOptionLabelFromRecordUsing(fn (Model $record) => ucwords($record->name)),

                        Select::make('blog_category_id')
                            ->label('Category')
                            ->relationship(name: 'blogCategory', titleAttribute: 'cat_name')
                            ->searchable()
                            ->preload()
                            ->optionsLimit(6)
                            ->required()
                            ->getOptionLabelFromRecordUsing(fn (Model $record) => ucwords($record->cat_name))
                            ->createOptionForm([

                                Section::make('')
                                ->schema([

                                    Group::make()
                                    ->schema([
                                        TextInput::make('cat_name')
                                            ->label('Name')
                                            ->required()
                                            ->placeholder('Enter the name of the category')
                                            ->live(onBlur: true)
                                            ->maxLength(255)
                                            ->afterStateUpdated(fn (string $state, Forms\Set $set) => $set('cat_slug', Str::slug($state))),
                                            // ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('cat_slug', Str::slug($state)) : null),


                                        TextInput::make('cat_slug')
                                            ->label('Slug')
                                            ->disabled()
                                            ->dehydrated()
                                            ->required()
                                            ->maxLength(255)
                                            ->unique(BlogCategory::class, 'cat_slug', ignoreRecord: true),
                                    ])
                                    ->columns([
                                        'sm' => 1,
                                        'md' => 2,
                                    ]),

                                    ToggleButtons::make('cat_is_visible')
                                    ->label('Is visible to the public?')
                                    ->boolean()
                                    ->default(true)
                                    ->dehydrated()
                                    ->grouped(),

                                    Textarea::make('cat_description')
                                        ->label('Description')
                                        ->placeholder('Enter the description of the category')
                                        ->rows(6)
                                        ->maxLength(3000)
                                        ->columnSpanFull(),
                                ])

                            ]),
                    ])
                ])
                ->columns([
                    'sm' => 1,
                    'md' => 1,
                    'lg' => 1,
                ]),
            ])
            ->columns([
                'sm' => 1,
                'md' => 3,
                'lg' => 3,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('featured_img')
                ->label('Image')
                ->extraImgAttributes(['loading' => 'lazy'])
                ->square()
                ->size(50),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::ExtraBold)
                    ->description(fn (BlogPost $record): string => Str::limit($record->slug, 40))
                    ->badge()
                    ->color('primary')
                    ->wrap()
                    ->limit(40),

                TextColumn::make('user.name')
                    ->searchable()
                    ->sortable()
                    ->label('Author')
                    ->formatStateUsing(fn (string $state): string => ucwords($state)),

                TextColumn::make('blogCategory.cat_name')
                    ->searchable()
                    ->sortable()
                    ->label('Category')
                    ->formatStateUsing(fn (string $state): string => ucwords($state))
                    ->badge()
                    ->color('warning'),

                TextColumn::make('published_at')
                    ->searchable()
                    ->sortable()
                    ->label('Published Date')
                    ->dateTime('M j, Y'),

                ToggleColumn::make('is_visible')
                    ->label('Visibility')
                    ->sortable()
                    ->searchable(),

            ])
            ->filters([
                Tables\Filters\Filter::make('published_at')
                    ->form([
                        Forms\Components\DatePicker::make('published_from')
                            ->placeholder(fn ($state): string => 'Dec 18, ' . now()->subYear()->format('Y'))
                            ->native(false),
                        Forms\Components\DatePicker::make('published_until')
                            ->placeholder(fn ($state): string => now()->format('M d, Y'))
                            ->native(false),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_from'] ?? null,
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '>=', $date),
                            )
                            ->when(
                                $data['published_until'] ?? null,
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['published_from'] ?? null) {
                            $indicators['published_from'] = 'Published from ' . Carbon::parse($data['published_from'])->toFormattedDateString();
                        }
                        if ($data['published_until'] ?? null) {
                            $indicators['published_until'] = 'Published until ' . Carbon::parse($data['published_until'])->toFormattedDateString();
                        }

                        return $indicators;
                    }),
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
                    ->modalDescription('Toggle visibility is to make the selected blog(s) visible or hidden on the website.')
                    ->modalSubmitActionLabel('Yes')
                    ->color('success'),
                ]),
            ])
            ->deferLoading()
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                ->icon('heroicon-m-plus')
                ->label(__('New Blog')),
            ])
            ->emptyStateIcon('heroicon-o-newspaper')
            ->emptyStateHeading('No Blogs are created')
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
            'index' => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'edit' => Pages\EditBlogPost::route('/{record}/edit'),
            'view' => Pages\ViewBlogPost::route('/{record}'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\ViewBlogPost::class,
            Pages\EditBlogPost::class,
        ]);
    }


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfoSection::make()
                    ->schema([
                        Split::make([
                            ImageEntry::make('featured_img')
                            ->hiddenLabel()
                            ->width(300)
                            ->height(300)
                            ->grow(false),

                            Grid::make(2)
                                ->schema([
                                    InfoGroup::make([

                                        TextEntry::make('title')
                                        ->weight(FontWeight::ExtraBold)
                                        ->size(TextEntry\TextEntrySize::Large)
                                        ->icon('heroicon-o-newspaper')
                                        ->formatStateUsing(fn (string $state): string => ucwords($state)),

                                        TextEntry::make('slug'),

                                        TextEntry::make('published_at')
                                            ->badge()
                                            ->date()
                                            ->color('success'),

                                    ]),
                                    InfoGroup::make([

                                        TextEntry::make('user.name')
                                        ->label('Author')
                                        ->icon('heroicon-o-user')
                                        ->formatStateUsing(fn (string $state): string => ucwords($state)),

                                        TextEntry::make('blogCategory.cat_name')
                                        ->label('Category')
                                        ->icon('heroicon-o-swatch')
                                        ->badge()
                                        ->color('warning')
                                        ->formatStateUsing(fn (string $state): string => ucwords($state)),
                                    ]),
                                ]),

                        ])->from('lg'),
                    ]),
                InfoSection::make('Content')
                    ->icon('heroicon-o-document-text')
                    ->schema([


                        TextEntry::make('content')
                            ->prose()
                            ->markdown()
                            ->hiddenLabel(),


                    ])
                    ->collapsible()
            ]);
    }
}
