<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $messageModel;

    public function __construct(Message $message)
    {
        $this->messageModel = $message;
    }

    public function build()
    {
        $m = $this->subject('Website message: ' . ($this->messageModel->type ?? 'message'))
            ->view('emails.message_received')
            ->with(['msg' => $this->messageModel]);

        if ($this->messageModel->attachment) {
            $path = storage_path('app/public/' . $this->messageModel->attachment);
            if (file_exists($path)) {
                $m->attach($path);
            }
        }

        return $m;
    }
}
