<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AvailableflatsEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;

    public $Availableflatfrom;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $Availableflatfrom)
    {
        $this->subject = $subject;
        $this->Availableflatfrom = $Availableflatfrom;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'frontend.pages.available-falts-from-mail-design',
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
