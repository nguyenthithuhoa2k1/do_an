<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    private $data = [];
    /**
     * Create a new message instance.
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     * @return $this
     */

    public function build()
    {
        return $this->from('nhoa04112k1@gmail.com','test')
        ->subject($this->data['subject'])
        ->view('emails.index')->with('data',$this->data);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mail Notify',
        );
    }



    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.index',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
