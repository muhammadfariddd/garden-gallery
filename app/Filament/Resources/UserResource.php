<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Users';

    protected static ?string $modelLabel = 'User';

    protected static ?string $pluralModelLabel = 'Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('User Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter user name'),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->placeholder('Enter email address'),
                        Forms\Components\Select::make('role')
                            ->options([
                                'user' => 'User',
                                'admin' => 'Admin',
                            ])
                            ->required()
                            ->default('user')
                            ->placeholder('Select user role'),
                    ])->columns(2),

                Forms\Components\Section::make('Authentication')
                    ->schema([
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->dehydrateStateUsing(fn($state) => !empty($state) ? bcrypt($state) : null)
                            ->dehydrated(fn($state) => filled($state))
                            ->required(fn(string $context): bool => $context === 'create')
                            ->minLength(8)
                            ->maxLength(255)
                            ->placeholder('Enter password')
                            ->helperText('Minimum 8 characters'),
                        Forms\Components\DateTimePicker::make('email_verified_at')
                            ->label('Email Verified At')
                            ->placeholder('Select verification date'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Name'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->label('Email'),
                Tables\Columns\TextColumn::make('role')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'admin' => 'danger',
                        'user' => 'primary',
                        default => 'gray',
                    })
                    ->label('Role'),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Verified At')
                    ->placeholder('Not verified'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Joined')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Updated')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->options([
                        'user' => 'User',
                        'admin' => 'Admin',
                    ])
                    ->label('Filter by Role'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
