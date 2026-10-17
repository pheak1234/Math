<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\User;
use Filament\Actions;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('approve')
                ->label('យល់ព្រម (Approve)')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->visible(fn (): bool => $this->record->status === 'pending')
                ->requiresConfirmation()
                ->modalHeading('បញ្ជាក់ការបញ្ជាទិញ')
                ->modalDescription('តើអ្នកពិតជាចង់យល់ព្រមលើការបញ្ជាទិញនេះ និងបើកសិទ្ធិអានជូនអតិថិជនមែនទេ?')
                ->action(function () {
                    $record = $this->record;
                    $record->status = 'completed';
                    $record->notes = trim(($record->notes ? $record->notes."\n" : '').'Approved by Admin in Filament on '.now());
                    $record->save();

                    if ($record->book_id) {
                        $targetUser = $record->user ?: ($record->customer_phone ? User::where('phone', $record->customer_phone)->first() : null);
                        if ($targetUser) {
                            if (! $record->user_id) {
                                $record->user_id = $targetUser->id;
                                $record->saveQuietly();
                            }
                            $targetUser->books()->syncWithoutDetaching([
                                $record->book_id => [
                                    'status' => 'reading',
                                    'progress' => 0,
                                ],
                            ]);
                        }
                    }

                    $record->notifyUser('approved');

                    Notification::make()
                        ->title('បានបញ្ជាក់ជោគជ័យ')
                        ->body("ការបញ្ជាទិញ #{$record->order_code} ត្រូវបានអនុម័ត និងបានផ្ញើដំណឹងជូនអតិថិជនរួចរាល់។")
                        ->success()
                        ->send();

                    $this->fillForm();
                }),

            Actions\Action::make('reject')
                ->label('បដិសេធ (Reject)')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->visible(fn (): bool => $this->record->status === 'pending')
                ->requiresConfirmation()
                ->modalHeading('បដិសេធការបញ្ជាទិញ')
                ->modalDescription('សូមបញ្ជាក់ពីការបដិសេធការបញ្ជាទិញនេះ។ អ្នកអាចបញ្ចូលមូលហេតុដើម្បីផ្ញើដំណឹងជូនអតិថិជនបានដឹង។')
                ->form([
                    Forms\Components\Textarea::make('reason')
                        ->label('មូលហេតុបដិសេធ (Reason for Rejection)')
                        ->placeholder('ឧទាហរណ៍៖ បង្កាន់ដៃមិនត្រឹមត្រូវ, មិនទាន់ទទួលបានប្រាក់ទូទាត់...')
                        ->rows(3),
                ])
                ->action(function (array $data) {
                    $record = $this->record;
                    $record->status = 'cancelled';
                    $reason = ! empty($data['reason']) ? trim($data['reason']) : null;
                    if ($reason) {
                        $record->notes = trim(($record->notes ? $record->notes."\n" : '')."Rejected by Admin: {$reason} on ".now());
                    }
                    $record->save();

                    $record->notifyUser('rejected', $reason);

                    Notification::make()
                        ->title('បានបដិសេធ')
                        ->body("ការបញ្ជាទិញ #{$record->order_code} ត្រូវបានបដិសេធ និងបានផ្ញើដំណឹងជូនអតិថិជនរួចរាល់។")
                        ->warning()
                        ->send();

                    $this->fillForm();
                }),

            Actions\DeleteAction::make(),
        ];
    }
}
