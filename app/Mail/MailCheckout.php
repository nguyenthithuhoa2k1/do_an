<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailCheckout extends Mailable
{
    use Queueable, SerializesModels;

     private $data = [];
    /**
     * Create a new message instance.
     * @return void
     */
    public function __construct($cart)
    {
        $this->data = $cart;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mail Checkout',
        );
    }

    public function build()
    {
        return $this->from('nhoa04112k1@gmail.com','test')
        ->subject($this->data['subject'])
        ->view('emails.index')->with('data',$this->data);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'frontend.mail.index',
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
