<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InsuranceEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $insurance;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $insurance)
    {
        $this->subject = $subject;
        $this->insurance = $insurance;
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
            view: 'frontend.pages.insurance-mail-design',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        if ($this->insurance->previous_policy) {
            return [
                Attachment::fromPath(storage_path('app/public/' . $this->insurance->previous_policy)),
            ];
        } else {
            return [];
        }
    }
}
