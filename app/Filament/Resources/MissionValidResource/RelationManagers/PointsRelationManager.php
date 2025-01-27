<?php

namespace App\Filament\Resources\MissionValidResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PointsRelationManager extends RelationManager
{
    protected static string $relationship = 'points';

    protected static ?string $title = 'النقاط الدالة';

    protected static ?string $navigationLabel = 'متابعة النقاط الدالة';

    protected static ?string $modelLabel = 'نقطة دالة';

    protected static ?string $pluralModelLabel = 'قائمة النقاط الدالة';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('إسم النقطة')
                    ->searchable(),
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
