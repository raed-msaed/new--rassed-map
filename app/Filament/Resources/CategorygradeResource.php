<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategorygradeResource\Pages;
use App\Filament\Resources\CategorygradeResource\RelationManagers;
use App\Models\Categorygrade;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategorygradeResource extends Resource
{
    protected static ?string $model = Categorygrade::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'أصناف الرتب';

    protected static ?string $modelLabel = 'الصنف';

    protected static ?string $pluralModelLabel = 'التصنيف';

   // protected static ?int $navigationSort = 1;
    
    protected static ?string $navigationGroup = 'تسيير';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('الصنف')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('الصنف')
                    ->searchable(),
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
            'index' => Pages\ListCategorygrades::route('/'),
            'create' => Pages\CreateCategorygrade::route('/create'),
            'view' => Pages\ViewCategorygrade::route('/{record}'),
            'edit' => Pages\EditCategorygrade::route('/{record}/edit'),
        ];
    }
}