<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Mahasiswa;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MahasiswaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MahasiswaResource\RelationManagers;
use Filament\Tables\Filters\MultiSelectFilter;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('mhsNiu')->label('NPM'),
                TextColumn::make('mhsNomorTes')->label('Nomor Tes'),
                TextColumn::make('mhsNama')->label('Nama'),
                TextColumn::make('mhsTanggalLahir')->label('Tanggal Lahir'),
                TextColumn::make('mhsTahunAjaran')->label('Angkatan'),

            ])
            ->filters([
                MultiSelectFilter::make('Angkatan')
                    ->options([
                        '2022' => 2022,
                        '2021' => 2021
                    ])->column('mhsTahunAjaran'),
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
            'index' => Pages\ListMahasiswas::route('/'),
            //'create' => Pages\CreateMahasiswa::route('/create'),
            //'edit' => Pages\EditMahasiswa::route('/{record}/edit'),
        ];
    }
}
