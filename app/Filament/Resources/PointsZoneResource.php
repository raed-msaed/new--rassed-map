<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PointsZoneResource\Pages;
use App\Filament\Resources\PointsZoneResource\RelationManagers;
use App\Models\Points_zone;
use App\Models\PointsZone;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PointsZoneResource extends Resource
{
    protected static ?string $model = Points_zone::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'نقاط تحديد المنطقة ';

    protected static ?string $modelLabel = 'نقطة';

    protected static ?string $pluralModelLabel = 'النقاط';

    protected static ?int $navigationSort = 4;
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
            'index' => Pages\ListPointsZones::route('/'),
            'create' => Pages\CreatePointsZone::route('/create'),
            'view' => Pages\ViewPointsZone::route('/{record}'),
            'edit' => Pages\EditPointsZone::route('/{record}/edit'),
        ];
    }
}
