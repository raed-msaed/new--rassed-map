<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuivExecMissionResource\Pages;
use App\Filament\Resources\SuivExecMissionResource\RelationManagers;
use App\Models\Suiv_exec_mission;
use App\Models\SuivExecMission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuivExecMissionResource extends Resource
{
    protected static ?string $model = Suiv_exec_mission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                //
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
            'index' => Pages\ListSuivExecMissions::route('/'),
            'create' => Pages\CreateSuivExecMission::route('/create'),
            'view' => Pages\ViewSuivExecMission::route('/{record}'),
            'edit' => Pages\EditSuivExecMission::route('/{record}/edit'),
        ];
    }
}
