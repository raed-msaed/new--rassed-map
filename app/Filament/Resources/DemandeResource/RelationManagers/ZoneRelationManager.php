<?php

namespace App\Filament\Resources\DemandeResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ZoneRelationManager extends RelationManager
{
    protected static string $relationship = 'Zone';

    protected static ?string $title = 'قائمة المناطق';

    protected static ?string $navigationLabel = 'متابعة المناطق';

    protected static ?string $modelLabel = 'منطقة';

    protected static ?string $pluralModelLabel = 'قائمة المناطق';

    public function form(Form $form): Form
    {
        return $form
            /* ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);*/
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('إسم المنطقة')
                    ->required()
                    ->columnSpanFull(),

                // Section pour les zones d'intérêt
                Forms\Components\Section::make('مناطق الإهتمام')
                    ->schema([
                        Forms\Components\Repeater::make('zoneInterets')
                            ->relationship()
                            ->label('')
                            ->schema([
                                Forms\Components\TextInput::make('attributes')
                                    ->label('رمز منطقة الإهتمام')
                                    ->required(),

                                // Points du contour (polygone)
                                Forms\Components\Repeater::make('points_zone')
                                    ->relationship()
                                    ->label('نقاط حدودية منطقة الإهتمام')
                                    ->schema([
                                        Forms\Components\TextInput::make('latitude')
                                            ->label('خط العرض')
                                            ->numeric()
                                            ->required(),
                                        Forms\Components\TextInput::make('longitude')
                                            ->label('خط الطول')
                                            ->numeric()
                                            ->required(),
                                    ])
                                    ->columns(2)
                                    ->columnSpanFull(),

                                // Points d'intérêt spécifiques
                                Forms\Components\Repeater::make('points_interet')
                                    ->relationship()
                                    ->label('نقاط الإهتمام')
                                    ->schema([
                                        Forms\Components\TextInput::make('latitude')
                                            ->label('خط العرض')
                                            ->numeric()
                                            ->required(),
                                        Forms\Components\TextInput::make('longitude')
                                            ->label('خط الطول')
                                            ->numeric()
                                            ->required(),
                                        Forms\Components\TextInput::make('attributes')
                                            ->label('وصف النقطة'),
                                    ])
                                    ->columns(3)
                                    ->columnSpanFull()
                            ])
                            ->columnSpanFull()
                            ->itemLabel(fn (array $state) => $state['name_varchar'] ?? 'إدخال منطقة إهتمام')
                            ->collapsible()
                            ->collapsed()
                            ->grid(2)
                    ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            // ->recordTitleAttribute('name')
            ->modifyQueryUsing(fn ($query) => $query->withCount('zoneInterets as zone_interets_count'))
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('إسم المنطقة')
                    ->searchable(),

                Tables\Columns\TextColumn::make('zone_interets_count')
                    ->label('مناطق الإهتمام')
                    ->badge()
                    ->color('success'),

                Tables\Columns\TextColumn::make('zoneInterets.attributes')
                    ->label('رمز منطقة الإهتمام')
                    ->listWithLineBreaks(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('إضافة منطقة'),
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
