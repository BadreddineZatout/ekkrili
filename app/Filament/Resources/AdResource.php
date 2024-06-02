<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdResource\Pages;
use App\Filament\Resources\AdResource\RelationManagers\TagsRelationManager;
use App\Models\Ad;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AdResource extends Resource
{
    protected static ?string $model = Ad::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->label('Type')
                    ->options([
                        0 => 'Louer',
                        1 => 'Acheter',
                    ])
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->label('Catégorie')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label('Prix')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\Select::make('user_id')
                    ->label('Client')
                    ->relationship('user', 'name', fn (Builder $query) => $query->whereHas('roles', fn ($query) => $query->where('name', '!=', 'super_admin')))
                    ->hidden(fn () => ! auth()->user()->hasRole('super_admin')),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Section::make('Emplacement')
                    ->description("Ajouter l'emplacement de la propriété")
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('address')
                            ->label('Addresse')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('city')
                            ->label('Ville')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('state')
                            ->label("L'état")
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('postal_code')
                            ->label('Code Postal')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('latitude')
                            ->label('Latitude')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('longitude')
                            ->label('Longitude')
                            ->required()
                            ->numeric(),
                    ]),
                Forms\Components\Toggle::make('is_published')
                    ->label('Publié')
                    ->live()
                    ->required(),
                Forms\Components\Toggle::make('is_premium')
                    ->label('Premium')
                    ->required(),
                Forms\Components\DatePicker::make('published_at')
                    ->label('Publié à')
                    ->visible(fn (Get $get) => $get('is_published')),
                Forms\Components\TextInput::make('vues')
                    ->label('Vues')
                    ->required()
                    ->numeric()
                    ->hiddenOn('create'),
                Forms\Components\TextInput::make('link_3d')
                    ->prefixIcon('tabler-360-view')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('agency_link')
                    ->prefixIcon('tabler-building-store')
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('images')
                    ->label('Images')
                    ->disk(env('STORAGE_DISK'))
                    ->multiple()
                    ->preserveFilenames()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Client')
                    ->default('---')
                    ->toggleable(fn () => auth()->user()->hasRole('super_admin'), isToggledHiddenByDefault: true)
                    ->hidden(fn () => auth()->user()->hasRole('client'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Prix')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Catégorie')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location.address')
                    ->label('Emplacement')
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_premium')
                    ->label('Premium')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Publié')
                    ->boolean(),
            ])
            ->modifyQueryUsing(fn (Builder $query) => auth()->user()->hasRole('client') ? $query->where('user_id', auth()->id()) : $query)
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TagsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAds::route('/'),
            'create' => Pages\CreateAd::route('/create'),
            'view' => Pages\ViewAd::route('/{record}'),
            'edit' => Pages\EditAd::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Annonce';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Annonces';
    }
}
