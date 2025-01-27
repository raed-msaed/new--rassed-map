<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MissionResource\RelationManagers\SuivmissionRelationManager;
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

    protected static ?int $navigationSort = 2;
    public static function getNavigationGroup(): ?string
    {
        return 'متابعة تنفيذ المهمات'; // Group name
    }

    public static function getNavigationLabel(): string
    {
        return 'متابعة النقاط الدالة';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('mission_id')
                    ->label('المهمة')
                    ->relationship('mission', 'refmission')
                    ->searchable() // Makes the field searchable
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->label('إسم النقطة')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('latitude')
                    ->label('خط الطول')
                    ->default(request()->get('latitude'))
                    ->required()
                    ->extraInputAttributes(['style' => 'text-align:right'])
                    ->extraAttributes(['dir' => 'ltr']),
                Forms\Components\TextInput::make('longitude')
                    ->label('خط العرض')
                    ->default(request()->get('longitude'))
                    ->required()
                    ->extraInputAttributes(['style' => 'text-align:right'])
                    ->extraAttributes(['dir' => 'ltr']),
                Forms\Components\Select::make('icon_id')
                    ->label('الأيقونة')
                    ->relationship('icon', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mission.refmission')
                    ->label('المهمة')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('إسم النقطة')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->label('خط الطول')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->label('خط العرض')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('icon.path')
                    ->label('الأيقونة')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('تاريخ التعديل')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('id', 'desc')
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
            SuivmissionRelationManager::class,
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
