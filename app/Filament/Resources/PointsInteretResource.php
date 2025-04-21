<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PointsInteretResource\Pages;
use App\Filament\Resources\PointsInteretResource\RelationManagers;
use App\Models\Points_interet;
use App\Models\PointsInteret;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PointsInteretResource extends Resource
{
    protected static ?string $model = Points_interet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'نقاط الإهتمام';

    protected static ?string $modelLabel = 'نقطة';

    protected static ?string $pluralModelLabel = 'النقاط';

    protected static ?int $navigationSort = 5;
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
            'index' => Pages\ListPointsInterets::route('/'),
            'create' => Pages\CreatePointsInteret::route('/create'),
            'view' => Pages\ViewPointsInteret::route('/{record}'),
            'edit' => Pages\EditPointsInteret::route('/{record}/edit'),
        ];
    }
}
