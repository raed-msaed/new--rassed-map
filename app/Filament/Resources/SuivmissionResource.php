<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuivmissionResource\Pages;
use App\Filament\Resources\SuivmissionResource\RelationManagers;
use App\Models\Suivmission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuivmissionResource extends Resource
{
    protected static ?string $model = Suivmission::class;

    protected static ?string $navigationIcon = 'fas-plane-circle-check';


    protected static ?string $navigationLabel = 'متابعة برنامج المهام';

    protected static ?string $modelLabel = 'تنفيذ مهمة';

    protected static ?string $pluralModelLabel = 'المهمات المنفذة';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('mission_id')
                    ->relationship('mission', 'id')
                    ->default(null),
                Forms\Components\DateTimePicker::make('datedebut')
                    ->label('تاريخ بداية التنفيذ'),
                Forms\Components\DateTimePicker::make('datefin')
                    ->label('تاريخ نهاية التنفيذ'),
                Forms\Components\TextInput::make('moyenne')
                    ->label('الوسيلة')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('point_id')
                    ->label('الإحداثية')
                    ->default(null),
                Forms\Components\TextInput::make('descriptionpoint')
                    ->label('وصف النقطة')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('reconnaissance')
                    ->label('الإستطلاع')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('descriptionphoto')
                    ->label('وصف الصورة')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('photoaerienne')
                    ->label('الصورة الجوية')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('photogeoaerienne')
                    ->label('الصورة الجيوفضائية')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('video')
                    ->label('الفيديو')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mission.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('datedebut')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('datefin')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('moyenne')
                    ->searchable(),
                Tables\Columns\TextColumn::make('point_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('descriptionpoint')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reconnaissance')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descriptionphoto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('photoaerienne')
                    ->searchable(),
                Tables\Columns\TextColumn::make('photogeoaerienne')
                    ->searchable(),
                Tables\Columns\TextColumn::make('video')
                    ->searchable(),
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
            'index' => Pages\ListSuivmissions::route('/'),
            'create' => Pages\CreateSuivmission::route('/create'),
            'view' => Pages\ViewSuivmission::route('/{record}'),
            'edit' => Pages\EditSuivmission::route('/{record}/edit'),
        ];
    }
}
