<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class schedule extends Mailable
{
    use Queueable, SerializesModels;

    public $date;
    public $location;
    public $interviewer;
    public $jo;

    /**
     * Create a new message instance.
     */
    public function __construct($interview_date, $location, $interviewer, $jo)
    {
        $this->date = $interview_date;
        $this->location = $location;
        $this->interviewer = $interviewer;
        $this->jo = $jo;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Schedule',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.interview-schedule',
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
