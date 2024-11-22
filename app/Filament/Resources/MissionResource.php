<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MissionResource\Pages;
use App\Filament\Resources\MissionResource\RelationManagers;
use App\Filament\Resources\MissionResource\RelationManagers\PointsRelationManager;
use App\Filament\Resources\MissionResource\RelationManagers\SuivmissionRelationManager;
use App\Filament\Resources\MissionResource\RelationManagers\SuivmissionsRelationManager;
use App\Models\Mission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Radio;

class MissionResource extends Resource
{
    protected static ?string $model = Mission::class;

    protected static ?string $navigationIcon = 'fas-plane-departure';

    protected static ?string $navigationLabel = 'المهمات';

    protected static ?string $modelLabel = 'مهمة';

    protected static ?string $pluralModelLabel = 'المهمات';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('refmission')
                    ->label('رمز المهمة')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('refdemande')
                    ->label('مرجع الطلب')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('datedemande')
                    ->label('تاريخ المطلب')
                    ->extraInputAttributes(['style' => 'text-align:right'])
                    ->native(false)
                    ->displayFormat('Y/m/d')
                    ->required(),
                Forms\Components\Select::make('organisation_id')
                    ->label('الجهة')
                    ->relationship('organisation', 'name')
                    ->required(),
                Forms\Components\DatePicker::make('datedebutmission')
                    ->extraInputAttributes(['style' => 'text-align:right'])
                    ->native(false)
                    ->displayFormat('Y/m/d')
                    ->label('تاريخ بداية المهمة'),
                Forms\Components\DatePicker::make('datefinmission')
                    ->extraInputAttributes(['style' => 'text-align:right'])
                    ->native(false)
                    ->displayFormat('Y/m/d')
                    ->label('تاريخ نهاية المهمة'),
                Forms\Components\TextInput::make('timemission')
                    ->label('التوقيت')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('type_mission')
                    ->label('صنف المهمة')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('objectif_mission')
                    ->label('الهدف من المهمة')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('zone')
                    ->label('المنطقة')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('besoinrenseignement')
                    ->label('حاجيات الإستعلام')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('signe')
                    ->label('المؤشرات')
                    ->maxLength(255)
                    ->default(null),
                Radio::make('accordgrci')
                    ->label('مصادقة مركز الإستطلاع')
                    ->options([
                        'نعم' => 'نعم',
                        'لا' => 'لا',
                    ]),
                Forms\Components\Select::make('organisationaccord_id')
                    ->label('الجهة المصادقة')
                    ->relationship('organisationaccord', 'name')
                    ->required(),
                Radio::make('statusaccord')
                    ->label('مصادقة الجهة')
                    ->options([
                        'نعم' => 'نعم',
                        'لا' => 'لا',
                    ]),
                Forms\Components\TextInput::make('remarqueaccord')
                    ->label('الملاحظات')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('refmission')
                    ->label('رمز المهمة')
                    ->searchable(),
                Tables\Columns\TextColumn::make('refdemande')
                    ->label('مرجع الطلب')
                    ->searchable(),
                Tables\Columns\TextColumn::make('datedemande')
                    ->label('تاريخ المطلب')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('organisation.name')
                    ->label('الجهة')
                    ->sortable(),
                Tables\Columns\TextColumn::make('datedebutmission')
                    ->label('تاريخ بداية المهمة')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('datefinmission')
                    ->label('تاريخ نهاية المهمة')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('timemission')
                    ->label('التوقيت')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type_mission')
                    ->label('صنف المهمة')
                    ->searchable(),
                Tables\Columns\TextColumn::make('objectif_mission')
                    ->label('الهدف من المهمة')
                    ->searchable(),
                Tables\Columns\TextColumn::make('zone')
                    ->label('المنطقة')
                    ->searchable(),
                Tables\Columns\TextColumn::make('besoinrenseignement')
                    ->label('حاجيات الإستعلام')
                    ->searchable(),
                Tables\Columns\TextColumn::make('accordgrci')
                    ->label('مصادقة مركز الإستطلاع')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organisationaccord.name')
                    ->label('الجهة المصادقة')
                    ->sortable(),
                Tables\Columns\TextColumn::make('statusaccord')
                    ->label('المصادقة')
                    ->searchable(),
                Tables\Columns\TextColumn::make('signe')
                    ->label('المؤشرات')
                    ->searchable(),
                Tables\Columns\TextColumn::make('remarqueaccord')
                    ->label('الملاحظات')
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
            PointsRelationManager::class,
            SuivmissionRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMissions::route('/'),
            'create' => Pages\CreateMission::route('/create'),
            'view' => Pages\ViewMission::route('/{record}'),
            'edit' => Pages\EditMission::route('/{record}/edit'),
        ];
    }
}
