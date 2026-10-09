<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MathExamResource\Pages;
use App\Models\MathExam;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MathExamResource extends Resource
{
    protected static ?string $model = MathExam::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Math Exams';
    protected static ?string $pluralModelLabel = 'Math Exams';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Exam Details')
                    ->schema([
                        Forms\Components\TextInput::make('title')->label('ចំណងជើងវិញ្ញាសា')->required(),
                        Forms\Components\TextInput::make('grade_level')->label('កម្រិតថ្នាក់ (ឧ. ទី១២)'),
                        Forms\Components\TextInput::make('duration_minutes')->label('រយៈពេល (នាទី)')->numeric()->default(60),
                        Forms\Components\TextInput::make('passing_score')->label('ពិន្ទុជាប់')->numeric()->default(50),
                        Forms\Components\RichEditor::make('description')->label('ការពិពណ៌នា')->columnSpanFull(),
                        Forms\Components\FileUpload::make('image')->label('រូបភាពចំណងជើង (Thumbnail)')->image()->directory('exam-images'),
                        Forms\Components\TextInput::make('priority')->label('Priority')->numeric()->default(0),
                        Forms\Components\Toggle::make('is_popular')->label('ពេញនិយម?')->default(true),
                    ])->columns(2),

                Forms\Components\Section::make('Questions (សំណួរ)')
                    ->schema([
                        Forms\Components\View::make('admin.math-symbols')
                            ->columnSpanFull(),
                        Forms\Components\Repeater::make('questions')
                            ->relationship('questions')
                            ->schema([
                                Forms\Components\RichEditor::make('question_text')
                                    ->label('សំណួរ')
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\FileUpload::make('image')
                                    ->label('រូបភាពសំណួរ (បើមាន)')
                                    ->image(),
                                Forms\Components\TextInput::make('points')
                                    ->label('ពិន្ទុ')
                                    ->numeric()
                                    ->default(1),
                                
                                Forms\Components\Repeater::make('options')
                                    ->relationship('options')
                                    ->schema([
                                        Forms\Components\RichEditor::make('option_text')
                                            ->label('ជម្រើសចម្លើយ (ឧ. ក, ខ)')
                                            ->required()
                                            ->columnSpanFull(),
                                        Forms\Components\Toggle::make('is_correct')
                                            ->label('ជាចម្លើយត្រឹមត្រូវ? (Correct Answer)')
                                            ->default(false)
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2)
                                    ->defaultItems(4)
                                    ->columnSpanFull()
                                    ->addActionLabel('បន្ថែមជម្រើស'),
                            ])
                            ->columns(2)
                            ->orderColumn('order')
                            ->collapsible()
                            ->collapsed(false)
                            ->addActionLabel('បន្ថែមសំណួរថ្មី'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('រូបភាព'),
                Tables\Columns\TextColumn::make('title')->label('ចំណងជើង')->searchable(),
                Tables\Columns\TextColumn::make('duration_minutes')->label('នាទី'),
                Tables\Columns\IconColumn::make('is_popular')->label('ពេញនិយម')->boolean(),
                Tables\Columns\TextColumn::make('priority')->sortable(),
            ])
            ->filters([])
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMathExams::route('/'),
            'create' => Pages\CreateMathExam::route('/create'),
            'edit' => Pages\EditMathExam::route('/{record}/edit'),
        ];
    }
}