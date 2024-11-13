<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PointResource\Pages;
use App\Filament\Resources\PointResource\RelationManagers;
use App\Models\Point;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PointResource extends Resource
{
    protected static ?string $model = Point::class;

    protected static ?string $navigationIcon = 'bx-map';

    protected static ?string $navigationLabel = 'متابعة النقاط الدالة';

    protected static ?string $modelLabel = 'نقطة دالة';

    protected static ?string $pluralModelLabel = 'قائمة النقاط الدالة';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('icon_id')
                    ->required()
                    ->relationship('icon', 'name'),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('latitude')
                    ->default(request()->get('latitude'))
                    ->required()
                    ->extraAttributes([
                        'dir' => 'rtl', // Sets text direction to RTL
                    ]),
                Forms\Components\TextInput::make('longitude')
                    ->default(request()->get('longitude'))
                    ->required()
                    ->extraAttributes([
                        'dir' => 'rtl', // Sets text direction to RTL
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('icon.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('latitude'),
                Tables\Columns\TextColumn::make('longitude'),
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
            'index' => Pages\ListPoints::route('/'),
            'create' => Pages\CreatePoint::route('/create'),
            'view' => Pages\ViewPoint::route('/{record}'),
            'edit' => Pages\EditPoint::route('/{record}/edit'),
        ];
    }
}
