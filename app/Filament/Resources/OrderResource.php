<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('order_code')
                    ->label('Bill Ref / Order Code')
                    ->disabled(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name'),
                Forms\Components\Select::make('teaching_material_id')
                    ->relationship('teachingMaterial', 'name'),
                Forms\Components\Select::make('book_id')
                    ->relationship('book', 'title'),
                Forms\Components\TextInput::make('customer_name')
                    ->required(),
                Forms\Components\TextInput::make('customer_phone')
                    ->tel()
                    ->required(),
                Forms\Components\TextInput::make('customer_address'),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('total_price')
                    ->required()
                    ->numeric(),

                Forms\Components\Select::make('payment_method')
                    ->options([
                        'cod' => 'Cash on Delivery',
                        'khqr' => 'KHQR Transfer',
                    ])
                    ->required(),
                Forms\Components\FileUpload::make('payment_receipt')
                    ->image()
                    ->directory('receipts'),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_code')
                    ->label('Bill Ref')
                    ->badge()
                    ->color('primary')
                    ->copyable()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('teachingMaterial.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('book.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('customer_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_price')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('payment_method')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'khqr' => 'info',
                        'cod' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\ImageColumn::make('payment_receipt')
                    ->label('Receipt')
                    ->circular(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'pending' => 'warning',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
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
                Tables\Actions\Action::make('approve')
                    ->label('យល់ព្រម (Approve)')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn (Order $record): bool => $record->status === 'pending')
                    ->requiresConfirmation()
                    ->modalHeading('បញ្ជាក់ការបញ្ជាទិញ')
                    ->modalDescription('តើអ្នកពិតជាចង់យល់ព្រមលើការបញ្ជាទិញនេះ និងបើកសិទ្ធិអានជូនអតិថិជនមែនទេ?')
                    ->action(function (Order $record) {
                        $record->status = 'completed';
                        $record->notes = trim(($record->notes ? $record->notes."\n" : '').'Approved by Admin in Filament on '.now());
                        $record->save();

                        if ($record->book_id && $record->user_id) {
                            $user = User::find($record->user_id);
                            if ($user) {
                                $user->books()->syncWithoutDetaching([
                                    $record->book_id => [
                                        'status' => 'reading',
                                        'progress' => 0,
                                    ],
                                ]);
                            }
                        }

                        Notification::make()
                            ->title('បានបញ្ជាក់ជោគជ័យ')
                            ->body("ការបញ្ជាទិញ #{$record->order_code} ត្រូវបានអនុម័ត និងបើកសិទ្ធិអានជូនអតិថិជនរួចរាល់។")
                            ->success()
                            ->send();
                    }),
                Tables\Actions\Action::make('reject')
                    ->label('បដិសេធ (Reject)')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn (Order $record): bool => $record->status === 'pending')
                    ->requiresConfirmation()
                    ->action(function (Order $record) {
                        $record->status = 'cancelled';
                        $record->save();

                        Notification::make()
                            ->title('បានបដិសេធ')
                            ->body("ការបញ្ជាទិញ #{$record->order_code} ត្រូវបានបដិសេធ។")
                            ->warning()
                            ->send();
                    }),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
