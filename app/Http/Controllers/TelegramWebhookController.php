<?php

namespace App\Http\Controllers;

use App\Services\TelegramPaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TelegramWebhookController extends Controller
{
    public function handle(Request $request, TelegramPaymentService $paymentService)
    {
        $update = $request->all();
        Log::info('Telegram Webhook Received:', $update);

        // 1. Handle Callback Query from Admin Inline Keyboard Buttons
        if (isset($update['callback_query'])) {
            $result = $paymentService->processCallbackQuery($update['callback_query']);

            return response()->json($result);
        }

        // 2. Handle Text message / ABA PayWay / Admin text
        $msg = $update['message'] ?? ($update['channel_post'] ?? ($update['edited_message'] ?? ($update['edited_channel_post'] ?? null)));

        if ($msg) {
            $chatId = $msg['chat']['id'] ?? null;
            $text = $msg['text'] ?? ($msg['caption'] ?? '');
            $messageId = $msg['message_id'] ?? null;

            if (! empty($text)) {
                $result = $paymentService->processMessage($text, $chatId, $messageId);

                return response()->json($result);
            }
        }

        return response()->json(['status' => 'ok']);
    }
}
