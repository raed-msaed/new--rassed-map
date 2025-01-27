<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistoryLogResource\Pages;
use App\Filament\Resources\HistoryLogResource\RelationManagers;
use App\Models\HistoryLog;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components\Text;
use Filament\Infolists\Components\TextEntry\TextEntrySize;


use function Laravel\Prompts\text;

class HistoryLogResource extends Resource
{
    protected static ?string $model = HistoryLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationLabel = 'سجلات الأحداث';

    protected static ?string $pluralModelLabel =  'سجلات الأحداث';

    protected static ?string $modelLabel = 'السجل';

    protected static ?string $navigationGroup = 'تسيير';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                /*  Forms\Components\TextInput::make('user_id')
                    ->numeric()
                    ->default(null),*/
                Forms\Components\TextInput::make('user_name')
                    ->label('إسم المستعمل')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('action')
                    ->label('العملية')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('model')
                    ->label('الجدول')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('changes')
                    ->label('التغييرات')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_name')
                    ->label('إسم المستعمل')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('action')
                    ->label('العملية')
                    ->color(fn ($record) => $record->action === 'created' ? 'success' : ($record->action === 'updated' ? 'warning' : 'default')) // Highlight created and updated logs
                    ->sortable()
                    ->searchable()
                    ->color(fn ($record) => $record->action === 'deleted' ? 'danger' : 'default'), // Highlight deleted logs
                Tables\Columns\TextColumn::make('model')
                    ->label('الجدول')
                    ->sortable()
                    ->searchable(),
                /*Tables\Columns\TextColumn::make('changes')
                    ->label('التغييرات')
                    ->limit(50)
                    ->label('Changes'),*/
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('action')
                    ->options([
                        'created' => 'إنشاء',
                        'updated' => 'تحيين',
                        'deleted' => 'حذف',
                    ])->label('البحث حسب '),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                //Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    public static function Infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('')
                    ->schema([
                        TextEntry::make('user_name')
                            ->label('إسم المستعمل'),
                        TextEntry::make('action')
                            ->label('العملية'),
                        TextEntry::make('model')
                            ->label('الجدول'),
                        TextEntry::make('changes')
                            ->label('التغييرات')
                            //->wrap()  // This wraps the text and ensures it doesn't overflow
                            ->extraAttributes([
                                'style' => 'word-wrap: break-word; overflow-y: auto;',
                                'dir' => 'ltr'
                            ])
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
            'index' => Pages\ListHistoryLogs::route('/'),
            // 'create' => Pages\CreateHistoryLog::route('/create'),
            //'view' => Pages\ViewHistoryLog::route('/{record}'),
            //'edit' => Pages\EditHistoryLog::route('/{record}/edit'),
        ];
    }
}
