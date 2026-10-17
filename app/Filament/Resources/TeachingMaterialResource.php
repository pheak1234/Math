<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeachingMaterialResource\Pages;
use App\Models\TeachingMaterial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class TeachingMaterialResource extends Resource
{
    protected static ?string $model = TeachingMaterial::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'សម្ភារៈបង្រៀន (Teaching Materials)';

    protected static ?string $modelLabel = 'សម្ភារៈបង្រៀន';

    protected static ?string $pluralModelLabel = 'សម្ភារៈបង្រៀន';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('ព័ត៌មានសម្ភារៈបង្រៀន (General Information)')
                    ->description('ព័ត៌មានមូលដ្ឋានដែលត្រូវបង្ហាញលើទំព័រមុខ និងកន្ត្រកទំនិញ')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('ឈ្មោះសម្ភារៈ (Name)')
                            ->required()
                            ->placeholder('ឧ. បន្ទាត់វាស់ស្ទង់ដែកអ៊ីណុក (Stainless Steel Ruler)')
                            ->maxLength(255),

                        Forms\Components\Select::make('category')
                            ->label('ប្រភេទសម្ភារៈ (Category)')
                            ->options([
                                'ឧបករណ៍វាស់ស្ទង់' => 'ឧបករណ៍វាស់ស្ទង់ (Measuring Tools)',
                                'ធរណីមាត្រ' => 'ធរណីមាត្រ (Geometry)',
                                'សៀវភៅជំនួយ' => 'សៀវភៅជំនួយ (Reference Guides)',
                                'សម្ភារៈពិសោធន៍' => 'សម្ភារៈពិសោធន៍ (Experiment Kit)',
                            ])
                            ->searchable()
                            ->preload()
                            ->createOptionUsing(fn (string $input): string => $input)
                            ->required(),

                        Forms\Components\TextInput::make('price')
                            ->label('តម្លៃ ($ / Price USD)')
                            ->numeric()
                            ->default(0)
                            ->prefix('$')
                            ->step(0.01)
                            ->required()
                            ->helperText('តម្លៃគិតជាដុល្លារ ($)។ ប្រសិនបើដាក់ 0 ឬទុកទទេ នឹងបង្ហាញជា "ឥតគិតថ្លៃ (Free)"។'),

                        Forms\Components\Select::make('grade_level')
                            ->label('កម្រិតថ្នាក់ (Grade Level)')
                            ->options([
                                'គ្រប់កម្រិតថ្នាក់' => 'គ្រប់កម្រិតថ្នាក់ (All Grades)',
                                'ថ្នាក់ទី ៧ ដល់ ១២' => 'ថ្នាក់ទី ៧ ដល់ ១២ (Grade 7-12)',
                                'ថ្នាក់ទី ៨ ដល់ ១២' => 'ថ្នាក់ទី ៨ ដល់ ១២ (Grade 8-12)',
                                'ថ្នាក់ទី ៩ ដល់ ១២' => 'ថ្នាក់ទី ៩ ដល់ ១២ (Grade 9-12)',
                                'ថ្នាក់ទី ១០ ដល់ ១២' => 'ថ្នាក់ទី ១០ ដល់ ១២ (Grade 10-12)',
                                'គ្រូបង្រៀន និងសិស្ស' => 'គ្រូបង្រៀន និងសិស្ស (Teachers & Students)',
                            ])
                            ->searchable()
                            ->preload()
                            ->createOptionUsing(fn (string $input): string => $input)
                            ->required(),

                        Forms\Components\Toggle::make('is_featured')
                            ->label('ពេញនិយម / បង្ហាញលើទំព័រដើម (Featured on Homepage)')
                            ->helperText('បើកជម្រើសនេះដើម្បីឱ្យសម្ភារៈបង្រៀននេះបង្ហាញលើ Carousel ក្នុងទំព័រដើម (Homepage)។')
                            ->default(false),

                        Forms\Components\TextInput::make('guide_url')
                            ->label('តំណភ្ជាប់មគ្គុទ្ទេសក៍ (Guide URL)')
                            ->placeholder('ឧ. https://... ឬ #guide-...')
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('រូបភាព និងការពិពណ៌នា (Media & Description)')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('រូបភាពតំណាង / Thumbnail (Main Image)')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '1:1',
                                '4:3',
                                '16:9',
                            ])
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeMode('cover')
                            ->imageResizeTargetWidth('1200')
                            ->imageResizeTargetHeight('1200')
                            ->imageResizeUpscale(false)
                            ->directory('teaching-materials')
                            ->maxSize(10240)
                            ->helperText('ជ្រើសរើសរូបភាព រួចចុចលើប៊ូតុងកែសម្រួល (Pencil) ដើម្បី Crop (កាត់ត) បង្វិល (Rotate) និង Resize (កំណត់ទំហំ)'),

                        Forms\Components\FileUpload::make('gallery')
                            ->label('កម្រងរូបភាពបន្ថែម / Gallery (Multiple Images)')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '1:1',
                                '4:3',
                                '16:9',
                            ])
                            ->imageResizeMode('cover')
                            ->imageResizeTargetWidth('1600')
                            ->imageResizeTargetHeight('1600')
                            ->imageResizeUpscale(false)
                            ->directory('teaching-materials/gallery')
                            ->maxSize(10240)
                            ->helperText('អ្នកអាចផ្ទុករូបភាពច្រើនសន្លឹក ហើយអាចចុចកែសម្រួល (Crop, Rotate, Resize) លើរូបនីមួយៗបាន')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('specifications')
                            ->label('លក្ខណៈបច្ចេកទេស (Specifications)')
                            ->placeholder('ឧ. ខ្នាត៖ ៣០ ស.ម | សម្ភារៈ៖ ដែកអ៊ីណុកមិនច្រេះ | គំនូសខ្នាតស្តង់ដារ')
                            ->rows(2)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->label('ការពិពណ៌នាលម្អិត (Full Description)')
                            ->placeholder('ព័ត៌មានលម្អិតពីអត្ថប្រយោជន៍ និងរបៀបប្រើប្រាស់ក្នុងការបង្រៀន...')
                            ->rows(4)
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('រូបភាព')
                    ->square()
                    ->checkFileExistence(false)
                    ->getStateUsing(function ($record) {
                        if (! $record->image) {
                            return asset('images/tool_ruler.svg');
                        }
                        if (str_starts_with($record->image, 'http')) {
                            return $record->image;
                        }
                        if (str_starts_with($record->image, '/')) {
                            return asset(ltrim($record->image, '/'));
                        }

                        return asset('storage/'.$record->image);
                    }),

                Tables\Columns\TextColumn::make('name')
                    ->label('ឈ្មោះសម្ភារៈ')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap()
                    ->description(fn (TeachingMaterial $record): string => Str::limit($record->description, 50)),

                Tables\Columns\TextColumn::make('category')
                    ->label('ប្រភេទ')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'ឧបករណ៍វាស់ស្ទង់' => 'info',
                        'ធរណីមាត្រ' => 'primary',
                        'សៀវភៅជំនួយ' => 'success',
                        'សម្ភារៈពិសោធន៍' => 'warning',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('តម្លៃ')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => $state > 0 ? '$'.number_format((float) $state, 2) : 'Free')
                    ->badge()
                    ->color(fn ($state) => $state > 0 ? 'warning' : 'success')
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('grade_level')
                    ->label('កម្រិតថ្នាក់')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('ពេញនិយម')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('gallery')
                    ->label('Gallery')
                    ->state(fn (TeachingMaterial $record): string => ! empty($record->gallery) && is_array($record->gallery) ? count($record->gallery).' រូប' : '-')
                    ->badge()
                    ->color(fn (string $state): string => $state !== '-' ? 'info' : 'gray')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('កាលបរិច្ឆេទ')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('ប្រភេទសម្ភារៈ')
                    ->options([
                        'ឧបករណ៍វាស់ស្ទង់' => 'ឧបករណ៍វាស់ស្ទង់ (Measuring Tools)',
                        'ធរណីមាត្រ' => 'ធរណីមាត្រ (Geometry)',
                        'សៀវភៅជំនួយ' => 'សៀវភៅជំនួយ (Reference Guides)',
                        'សម្ភារៈពិសោធន៍' => 'សម្ភារៈពិសោធន៍ (Experiment Kit)',
                    ]),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('ពេញនិយម (Featured)'),
            ])
            ->actions([
                Tables\Actions\Action::make('view_page')
                    ->label('មើលលើទំព័រ')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->color('gray')
                    ->url(fn (TeachingMaterial $record): string => route('teaching-materials.show', $record))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTeachingMaterials::route('/'),
            'create' => Pages\CreateTeachingMaterial::route('/create'),
            'edit' => Pages\EditTeachingMaterial::route('/{record}/edit'),
        ];
    }
}
