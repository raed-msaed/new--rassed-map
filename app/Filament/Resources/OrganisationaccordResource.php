<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganisationaccordResource\Pages;
use App\Filament\Resources\OrganisationaccordResource\RelationManagers;
use App\Models\Organisationaccord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;

class OrganisationaccordResource extends Resource
{
    protected static ?string $model = Organisationaccord::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'الجهة المصادقة';

    protected static ?string $modelLabel = 'الجهة';

    protected static ?string $pluralModelLabel = 'قائمة الجهات';

    protected static ?string $navigationGroup = 'الإعدادات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('إسم الجهة')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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

    public static function Infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('')
                    ->schema([
                        TextEntry::make('name')
                            ->label('إسم الجهة'),
                        /*TextEntry::make('employees_count')
                            ->state(function (Model $record): int {
                                return $record->employees()->count();
                            }),*/
                    ])
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
            'index' => Pages\ListOrganisationaccords::route('/'),
            'create' => Pages\CreateOrganisationaccord::route('/create'),
            //   'view' => Pages\ViewOrganisationaccord::route('/{record}'),
            'edit' => Pages\EditOrganisationaccord::route('/{record}/edit'),
        ];
    }
}
