<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DemandeResource\Pages;
use App\Filament\Resources\DemandeResource\RelationManagers;
use App\Models\Demande;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DemandeResource extends Resource
{
    protected static ?string $model = Demande::class;

    protected static ?string $navigationIcon = 'fas-list-check';

    protected static ?string $navigationLabel = 'الطلبات الواردة';

    protected static ?string $modelLabel = 'طلب';

    protected static ?string $pluralModelLabel = 'الطلبات';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('refdemande')
                    ->label('مرجع الطلب')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('datedemande')
                    ->label('تاريخ الطلب')
                    ->extraInputAttributes(['style' => 'text-align:right'])
                    ->native(false)
                    ->displayFormat('Y/m/d')
                    ->required(),
                Forms\Components\Select::make('organisation_id')
                    ->label('الجهة')
                    ->relationship('organisation', 'name')
                    ->required(),
                Forms\Components\TextInput::make('refmission')
                    ->label('رمز المهمة')
                    ->maxLength(255)
                    ->default(null),
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
                Forms\Components\TextInput::make('remarque')
                    ->label('الملاحظات')
                    ->maxLength(255)
                    ->default(null),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('refdemande')
                    ->label('مرجع الطلب')
                    ->searchable(),
                Tables\Columns\TextColumn::make('datedemande')
                    ->label('تاريخ الطلب')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('organisation.name')
                    ->label('الجهة')
                    ->sortable(),
                Tables\Columns\TextColumn::make('refmission')
                    ->label('رمز المهمة')
                    ->searchable(),
                Tables\Columns\TextColumn::make('datedebutmission')
                    ->label('تاريخ بداية المهمة')
                    ->date()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('datefinmission')
                    ->label('تاريخ نهاية المهمة')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('timemission')
                    ->label('التوقيت'),
                Tables\Columns\TextColumn::make('type_mission')
                    ->label('صنف المهمة')
                    ->searchable(),
                Tables\Columns\TextColumn::make('objectif_mission')
                    ->label('الهدف من المهمة'),
                Tables\Columns\TextColumn::make('accordgrci')
                    ->label('مصادقة مركز الإستطلاع')
                    ->searchable(),
                Tables\Columns\TextColumn::make('signe')
                    ->label('المؤشرات')
                    ->searchable(),
                Tables\Columns\TextColumn::make('remarque')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDemandes::route('/'),
            'create' => Pages\CreateDemande::route('/create'),
            'view' => Pages\ViewDemande::route('/{record}'),
            'edit' => Pages\EditDemande::route('/{record}/edit'),
        ];
    }
}
