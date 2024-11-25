<?php

namespace App\Filament\Resources\MissionInValidResource\RelationManagers;

use App\Models\Point;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class SuivmissionsRelationManager extends RelationManager
{
    protected static string $relationship = 'suivmission';

    protected static ?string $title = 'المهمات المنفذة';

    protected static ?string $navigationLabel = 'متابعة برنامج المهام';

    protected static ?string $modelLabel = 'تنفيذ مهمة';

    protected static ?string $pluralModelLabel = 'المهمات المنفذة';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('mission_id')
                    ->relationship('mission', 'refmission')
                    ->label('رمز المهمة')
                    ->default(null)
                    ->searchable() // Makes the field searchable
                    ->preload()
                    ->required()
                    ->reactive() // Makes the field reactive
                    ->afterStateUpdated(function (Set $set, $state) { // Type-hint `$set` as `Set`
                        // Reset the point_id when mission_id changes
                        $set('point_id', null);
                    }),
                Forms\Components\DateTimePicker::make('datedebut')
                    ->label('تاريخ بداية التنفيذ')
                    ->extraInputAttributes(['style' => 'text-align:right'])
                    ->native(false)
                    ->displayFormat('Y-m-d H:i:s'),
                Forms\Components\DateTimePicker::make('datefin')
                    ->label('تاريخ نهاية التنفيذ')
                    ->extraInputAttributes(['style' => 'text-align:right'])
                    ->native(false)
                    ->displayFormat('Y-m-d H:i:s'),
                Forms\Components\TextInput::make('moyenne')
                    ->label('الوسيلة')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Select::make('point_id')
                    ->label('النقطة الدالة')
                    ->options(function ($get) {
                        $missionId = $get('mission_id'); // Get the selected mission ID
                        if ($missionId) {
                            // Fetch points related to the selected mission
                            return Point::where('mission_id', $missionId)->pluck('title', 'id');
                        }
                        return []; // Return empty options if no mission is selected
                    })
                    ->searchable()
                    ->preload()
                    ->required()
                    ->disabled(fn ($get) => !$get('mission_id')), // Disable if no mission is selected
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
                Forms\Components\FileUpload::make('photoaerienne')
                    ->label('الصورة الجوية')
                    ->directory('attachment')
                    ->default(null),
                Forms\Components\FileUpload::make('photogeoaerienne')
                    ->label('الصورة الجيوفضائية')
                    ->directory('attachment')
                    ->default(null),
                Forms\Components\FileUpload::make('video')
                    ->label('الفيديو')
                    ->directory('attachment')
                    ->default(null),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('mission_id')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ع/ر'),
                Tables\Columns\TextColumn::make('mission.refmission')
                    ->label('رمز المهمة')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('datedebut')
                    ->label('تاريخ بداية التنفيذ')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('datefin')
                    ->label('تاريخ نهاية التنفيذ')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('moyenne')
                    ->label('الوسيلة')
                    ->searchable(),
                Tables\Columns\TextColumn::make('point.title')
                    ->label('النقطة الدالة')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('descriptionpoint')
                    ->label('وصف النقطة')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reconnaissance')
                    ->label('الإستطلاع')
                    ->searchable(),
                /*   Tables\Columns\TextColumn::make('descriptionphoto')
                    ->label('وصف الصورة')
                    ->searchable(),*/
                Tables\Columns\ImageColumn::make('photoaerienne')
                    ->label('الصورة الجوية'),
                Tables\Columns\ImageColumn::make('photogeoaerienne')
                    ->label('الصورة الجيوفضائية'),
                Tables\Columns\TextColumn::make('video')
                    ->label('الفيديو')
                    ->formatStateUsing(fn ($state) => $state ? '<a href="' . Storage::url($state) . '" target="_blank" style="font-weight: bold;color: #007bff;">مشاهدة</a>' : 'لا يوجد')
                    ->html(),
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
