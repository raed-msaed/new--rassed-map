<?php

namespace App\Filament\Resources\DemandeResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ZoneRelationManager extends RelationManager
{
    protected static string $relationship = 'Zone';

    protected static ?string $title = 'قائمة المناطق';

    protected static ?string $navigationLabel = 'متابعة المناطق';

    protected static ?string $modelLabel = 'منطقة';

    protected static ?string $pluralModelLabel = 'قائمة المناطق';
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                /*Forms\Components\TextInput::make('id')
                    ->required()
                    ->maxLength(255),*/
                Forms\Components\TextInput::make('name')
                    ->label('إسم المنطقة')
                    ->required(),

                /*  Forms\Components\Select::make('zone_id')
                    ->label('Zone principale')
                    ->relationship('zone', 'name')
                    ->required(),*/

                // Zones d'intérêt (many-to-many)
                Forms\Components\Select::make('zonesInteret')
                    ->label('منطقة الإهتمام')
                    ->relationship('zonesInteret', 'attributes')
                    ->multiple()
                    ->preload()
                    ->searchable(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ع/ر'),
                /* Tables\Columns\TextColumn::make('name')
                    ->label('إسم المنطقة')
                    ->searchable(),*/

                // Zone principale
                Tables\Columns\TextColumn::make('name')
                    ->label('إسم المنطقة')
                    ->sortable()
                    ->searchable(),

                // Zones d'intérêt (affichage sous forme de tags)
                Tables\Columns\TextColumn::make('zonesInteret.name')
                    ->label('منطقة الإهتمام')
                    ->badge()
                    ->separator(','),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
