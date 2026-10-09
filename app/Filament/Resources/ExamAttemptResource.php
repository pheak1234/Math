<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExamAttemptResource\Pages;
use App\Models\ExamAttempt;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ExamAttemptResource extends Resource
{
    protected static ?string $model = ExamAttempt::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationLabel = 'Test Results';
    protected static ?string $pluralModelLabel = 'Test Results';
    
    // Disable creating new records from admin panel
    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('សិស្ស (Student)')
                    ->searchable(),
                Tables\Columns\TextColumn::make('exam.title')
                    ->label('វិញ្ញាសា (Exam)')
                    ->searchable(),
                Tables\Columns\TextColumn::make('score')
                    ->label('ពិន្ទុ (Score)')
                    ->sortable()
                    ->formatStateUsing(fn ($state, $record) => $state . ' / ' . $record->exam->questions->count()),
                Tables\Columns\TextColumn::make('status')
                    ->label('ស្ថានភាព')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'in_progress' => 'warning',
                        'completed' => 'success',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('completed_at')
                    ->label('បញ្ចាប់នៅ (Completed At)')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageExamAttempts::route('/'),
        ];
    }
}