<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;

    public $lead;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $lead)
    {
        $this->subject = $subject;
        $this->lead = $lead;
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
        $formData = json_decode($this->lead->form_data);

        return new Content(
            view: 'frontend.pages.lead-mail-design',
            with: [
                'lead' => $this->lead,
                'resale_options' => $formData->resale_options ?? '',
                'rent_options' => $formData->rent_options ?? '',
                'loan_options' => $formData->loan_options ?? '',
                'flat_details' => $formData->flat_details ?? [],
                'furnished_type' => $formData->furnished_type ?? [],
                'car_number' => $formData->car_number ?? '',
                'sub_loan_options' => $formData->sub_loan_options ?? [],
                'mortgage_loan_options' => $formData->mortgage_loan_options ?? '',
                'sub_mortgage_loan_options' => $formData->sub_mortgage_loan_options ?? [],
                'salary_per_month' => $formData->salary_per_month ?? '',
                'loan_amount' => $formData->loan_amount ?? '',
                'insurance_options' => $formData->insurance_options ?? '',
                'car_make_model' => $formData->car_make_model ?? '',
                'manufacturing_year' => $formData->manufacturing_year ?? '',
                'kilometers' => $formData->kilometers ?? '',

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
        if ($this->lead->document) {
            return [
                Attachment::fromPath(storage_path('app/public/' . $this->lead->document)),
            ];
        } else {
            return [];
        }
    }
}
