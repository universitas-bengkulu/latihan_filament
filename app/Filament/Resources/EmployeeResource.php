<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Employee;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EmployeeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeResource\RelationManagers;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Fieldset::make('Kanan')->schema([
                        Card::make()
                        ->schema([
                            TextInput::make('first_name')
                            ->label('First Name')
                            ->required()
                            ->MaxLength(255),
                            TextInput::make('last_name')
                            ->label('Last Name')
                            ->required()
                            ->MaxLength(255),
                            TextInput::make('email')
                            ->label('E-Mail')
                            ->email()
                            ->required()
                            ->MaxLength(255),
                        ]),
                        Card::make()
                        ->schema([
                            TextInput::make('first_name')
                            ->label('First Name')
                            ->required()
                            ->MaxLength(255),
                            TextInput::make('last_name')
                            ->label('Last Name')
                            ->required()
                            ->MaxLength(255),
                            TextInput::make('email')
                            ->label('E-Mail')
                            ->email()
                            ->required()
                            ->MaxLength(255),
                        ]),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
