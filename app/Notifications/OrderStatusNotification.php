<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class OrderStatusNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public Order $order,
        public string $status,
        public ?string $reason = null,
        public ?string $customMessage = null
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $itemName = $this->order->item_name;
        $orderCode = $this->order->order_code ?? ('ORD-'.$this->order->id);
        $isApproved = in_array(strtolower($this->status), ['approved', 'completed'], true);

        if ($isApproved) {
            $title = "ការបញ្ជាទិញ #{$orderCode} ត្រូវបានយល់ព្រម!";
            $body = $this->customMessage ?: "ការបញ្ជាទិញ «{$itemName}» របស់អ្នកត្រូវបាន Admin យល់ព្រមរួចរាល់ហើយ។";
            $type = 'approved';
        } else {
            $title = "ការបញ្ជាទិញ #{$orderCode} ត្រូវបានបដិសេធ";
            $reasonSuffix = $this->reason ? " (មូលហេតុ៖ {$this->reason})" : '';
            $body = $this->customMessage ?: "ការបញ្ជាទិញ «{$itemName}» របស់អ្នកត្រូវបានបដិសេធ{$reasonSuffix}។";
            $type = 'rejected';
        }

        $actionUrl = ($this->order->book_id && $isApproved)
            ? route('books.read', $this->order->book_id)
            : route('dashboard', ['tab' => 'orders']);

        return [
            'order_id' => $this->order->id,
            'order_code' => $orderCode,
            'item_name' => $itemName,
            'item_image' => $this->order->item_image,
            'book_id' => $this->order->book_id,
            'teaching_material_id' => $this->order->teaching_material_id,
            'status' => $this->status,
            'type' => $type,
            'title' => $title,
            'body' => $body,
            'reason' => $this->reason,
            'action_url' => $actionUrl,
        ];
    }
}
