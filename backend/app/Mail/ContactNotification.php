<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $m = $this->subject('Website contact/support message')
            ->view('emails.contact_notification')
            ->with(['data' => $this->data]);

        if (!empty($this->data['attachment'])) {
            $path = storage_path('app/public/' . $this->data['attachment']);
            if (file_exists($path)) {
                $m->attach($path);
            }
        }

        return $m;
    }
}
