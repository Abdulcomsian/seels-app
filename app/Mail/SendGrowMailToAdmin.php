<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class SendGrowMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $toData;
    /**
     * Create a new message instance.
     */
    public function __construct($data, $toData)
    {
        $this->data = $data;
        $this->toData = $toData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->data['sender_mail'], 'Grow Request'),
            subject: 'Grow Request',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.user-grow-request',
            with: [
                'data' => $this->data,
                'toData' => $this->toData
            ]
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
