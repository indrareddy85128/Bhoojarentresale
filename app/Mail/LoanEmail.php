<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LoanEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;

    public $loan;

    public function __construct($subject, $loan)
    {
        $this->subject = $subject;
        $this->loan = $loan;
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
            view: 'frontend.pages.loans-mail-design',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        if ($this->loan->rc_copy) {
            return [
                Attachment::fromPath(storage_path('app/public/'.$this->loan->rc_copy)),
            ];
        } else {
            return [];
        }
    }
}
