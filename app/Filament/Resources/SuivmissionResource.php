<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuivmissionResource\Pages;
use App\Filament\Resources\SuivmissionResource\RelationManagers;
use App\Models\Suivmission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuivmissionResource extends Resource
{
    protected static ?string $model = Suivmission::class;

    protected static ?string $navigationIcon = 'fas-plane-circle-check';


    protected static ?string $navigationLabel = 'متابعة برنامج المهام';

    protected static ?string $modelLabel = 'تنفيذ مهمة';

    protected static ?string $pluralModelLabel = 'المهمات المنفذة';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('mission_id')
                    ->numeric()
                    ->default(null),
                Forms\Components\DateTimePicker::make('datedebut'),
                Forms\Components\DateTimePicker::make('datefin'),
                Forms\Components\TextInput::make('moyenne')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('dms')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('descriptionpoint')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('reconnaissance')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mission_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('datedebut')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('datefin')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('moyenne')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dms')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descriptionpoint')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reconnaissance')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSuivmissions::route('/'),
            'create' => Pages\CreateSuivmission::route('/create'),
            'view' => Pages\ViewSuivmission::route('/{record}'),
            'edit' => Pages\EditSuivmission::route('/{record}/edit'),
        ];
    }
}