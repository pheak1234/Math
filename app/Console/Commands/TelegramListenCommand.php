<?php

namespace App\Console\Commands;

use App\Services\TelegramPaymentService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramListenCommand extends Command
{
    protected $signature = 'telegram:listen {--timeout=20 : Long polling timeout in seconds}';

    protected $description = 'Listen for incoming Telegram updates and process ABA PayWay payments and Admin confirmations';

    public function handle(TelegramPaymentService $paymentService)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        if (! $token) {
            $this->error('TELEGRAM_BOT_TOKEN is not configured in .env');

            return 1;
        }

        $timeout = (int) $this->option('timeout');
        $this->info("🤖 Telegram Payment & Confirmation Listener started (timeout={$timeout}s)...");
        $this->info('Press Ctrl+C to stop.');

        $offset = 0;

        while (true) {
            try {
                $response = Http::timeout($timeout + 5)->get("https://api.telegram.org/bot{$token}/getUpdates", [
                    'offset' => $offset,
                    'timeout' => $timeout,
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    $updates = $data['result'] ?? [];

                    foreach ($updates as $update) {
                        $offset = $update['update_id'] + 1;

                        // 1. Handle Admin Callback Query (Buttons)
                        if (isset($update['callback_query'])) {
                            $this->line('<comment>[Callback Query]</comment> Data: '.($update['callback_query']['data'] ?? ''));
                            $result = $paymentService->processCallbackQuery($update['callback_query']);
                            $this->info('Callback result: '.json_encode($result, JSON_UNESCAPED_UNICODE));

                            continue;
                        }

                        // 2. Handle Text / Notification Messages
                        $msg = $update['message'] ?? ($update['channel_post'] ?? ($update['edited_message'] ?? ($update['edited_channel_post'] ?? null)));
                        if ($msg) {
                            $chatId = $msg['chat']['id'] ?? null;
                            $text = $msg['text'] ?? ($msg['caption'] ?? '');
                            $messageId = $msg['message_id'] ?? null;

                            if (! empty($text)) {
                                $this->line("<comment>[Incoming Message]</comment> Chat: {$chatId} | Text: ".substr(str_replace("\n", ' ', $text), 0, 80).'...');
                                $result = $paymentService->processMessage($text, $chatId, $messageId);
                                $this->info('Processing result: '.json_encode($result, JSON_UNESCAPED_UNICODE));
                            }
                        }
                    }
                } else {
                    $this->warn('Failed to fetch updates from Telegram: '.$response->body());
                    sleep(3);
                }
            } catch (\Throwable $e) {
                // Ignore timeout exceptions as they are normal for long-polling
                if (! str_contains($e->getMessage(), 'timed out') && ! str_contains($e->getMessage(), 'cURL error 28')) {
                    $this->error('Error polling Telegram: '.$e->getMessage());
                    Log::error('Telegram Polling Error:', ['exception' => $e->getMessage()]);
                    sleep(2);
                }
            }
        }

        return 0;
    }
}
