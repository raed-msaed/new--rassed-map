<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZoneInteretResource\Pages;
use App\Filament\Resources\ZoneInteretResource\RelationManagers;
use App\Models\Zone_interet;
use App\Models\ZoneInteret;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ZoneInteretResource extends Resource
{
    protected static ?string $model = Zone_interet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'مناطق الإهتمام';

    protected static ?string $modelLabel = 'منطقة إهتمام';

    protected static ?string $pluralModelLabel = 'مناطق الإهتمام';

    protected static ?int $navigationSort = 3;
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
            'index' => Pages\ListZoneInterets::route('/'),
            'create' => Pages\CreateZoneInteret::route('/create'),
            'view' => Pages\ViewZoneInteret::route('/{record}'),
            'edit' => Pages\EditZoneInteret::route('/{record}/edit'),
        ];
    }
}