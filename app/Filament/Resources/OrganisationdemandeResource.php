<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganisationdemandeResource\Pages;
use App\Filament\Resources\OrganisationdemandeResource\RelationManagers;
use App\Models\Organisationdemande;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrganisationdemandeResource extends Resource
{
    protected static ?string $model = Organisationdemande::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationLabel = 'جهة الإنتماء';

    protected static ?string $modelLabel = 'الجهة';

    protected static ?string $pluralModelLabel = 'قائمة الجهات';

    protected static ?string $navigationGroup = 'الإعدادات';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tables\Columns\TextColumn::make('name')
                    ->label('إسم الجهة')
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Section::make('')
                    ->schema([
                        TextEntry::make('name')
                            ->label('إسم الجهة'),
                        /*TextEntry::make('employees_count')
                            ->state(function (Model $record): int {
                                return $record->employees()->count();
                            }),*/
                    ])
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
            'index' => Pages\ListOrganisationdemandes::route('/'),
            'create' => Pages\CreateOrganisationdemande::route('/create'),
            'view' => Pages\ViewOrganisationdemande::route('/{record}'),
            'edit' => Pages\EditOrganisationdemande::route('/{record}/edit'),
        ];
    }
}
