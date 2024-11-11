<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MissionResource\Pages;
use App\Filament\Resources\MissionResource\RelationManagers;
use App\Models\Mission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MissionResource extends Resource
{
    protected static ?string $model = Mission::class;

    protected static ?string $navigationIcon = 'fas-plane-departure';

    protected static ?string $navigationLabel = 'المهمات';

    protected static ?string $modelLabel = 'مهمة';

    protected static ?string $pluralModelLabel = 'المهمات';

    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('refdemande')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('datedemande')
                    ->required(),
                Forms\Components\TextInput::make('organisation_id')
                    ->numeric()
                    ->default(null),
                Forms\Components\DatePicker::make('datedebutmission'),
                Forms\Components\DatePicker::make('datefinmission'),
                Forms\Components\TextInput::make('refmission')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('type_mission')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('objectif_mission')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('zone')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('dms')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('besoinrenseignement')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('signe')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('statusaccord')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('remarqueaccord')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('organisationaccord')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('refdemande')
                    ->searchable(),
                Tables\Columns\TextColumn::make('datedemande')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('organisation_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('datedebutmission')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('datefinmission')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('refmission')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type_mission')
                    ->searchable(),
                Tables\Columns\TextColumn::make('objectif_mission')
                    ->searchable(),
                Tables\Columns\TextColumn::make('zone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dms')
                    ->searchable(),
                Tables\Columns\TextColumn::make('besoinrenseignement')
                    ->searchable(),
                Tables\Columns\TextColumn::make('signe')
                    ->searchable(),
                Tables\Columns\TextColumn::make('statusaccord')
                    ->searchable(),
                Tables\Columns\TextColumn::make('remarqueaccord')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organisationaccord')
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
            'index' => Pages\ListMissions::route('/'),
            'create' => Pages\CreateMission::route('/create'),
            'view' => Pages\ViewMission::route('/{record}'),
            'edit' => Pages\EditMission::route('/{record}/edit'),
        ];
    }
}
