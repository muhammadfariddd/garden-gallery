<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationLabel = 'Products';

    protected static ?string $modelLabel = 'Product';

    protected static ?string $pluralModelLabel = 'Products';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Product Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter product name'),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->placeholder('product-name-slug'),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(4)
                            ->placeholder('Enter product description'),
                        Forms\Components\Textarea::make('care_instructions')
                            ->rows(3)
                            ->placeholder('Enter care instructions'),
                    ])->columns(2),

                Forms\Components\Section::make('Pricing & Inventory')
                    ->schema([
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('Rp ')
                            ->placeholder('0'),
                        Forms\Components\TextInput::make('stock')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->placeholder('0'),
                        Forms\Components\Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                                'out_of_stock' => 'Out of Stock',
                            ])
                            ->required()
                            ->default('active')
                            ->placeholder('Select status'),
                    ])->columns(3),

                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->required()
                            ->disk('public')
                            ->directory('uploads')
                            ->visibility('public')
                            ->placeholder('Upload product image'),
                    ]),

                Forms\Components\Section::make('Categories')
                    ->schema([
                        Forms\Components\Select::make('categories')
                            ->multiple()
                            ->relationship('categories', 'name')
                            ->preload()
                            ->searchable()
                            ->placeholder('Select categories'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->size(60)
                    ->label('Image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Name')
                    ->limit(30),
                Tables\Columns\TextColumn::make('price')
                    ->money('IDR')
                    ->sortable()
                    ->label('Price'),
                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->sortable()
                    ->label('Stock')
                    ->badge()
                    ->color(fn(int $state): string => match (true) {
                        $state === 0 => 'danger',
                        $state < 10 => 'warning',
                        default => 'success',
                    }),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'gray',
                        'out_of_stock' => 'danger',
                        default => 'gray',
                    })
                    ->label('Status'),
                Tables\Columns\TextColumn::make('categories.name')
                    ->label('Categories')
                    ->badge()
                    ->separator(','),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Created')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Updated')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'out_of_stock' => 'Out of Stock',
                    ])
                    ->label('Filter by Status'),
                Tables\Filters\SelectFilter::make('categories')
                    ->relationship('categories', 'name')
                    ->label('Filter by Category'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil'),
                Tables\Actions\DeleteAction::make()
                    ->icon('heroicon-o-trash'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
