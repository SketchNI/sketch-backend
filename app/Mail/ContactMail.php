<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public object $data;
    public string $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data, string $subject = 'A new message from SketchNI.UK')
    {
        $this->data = json_decode(json_encode($data));
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this->markdown('mail.contact')
            ->replyTo($this->data->email, $this->data->name)
            ->subject($this->subject);
    }
}
