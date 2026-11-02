<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class AdminAlert extends Mailable
{
    public function __construct(
        public string $title,
        public array $details,
        public ?string $body = null,
        public ?string $visitorEmail = null,
        public ?string $url = null,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->title,
            // « Répondre » écrit directement au visiteur
            replyTo: $this->visitorEmail ? [new Address($this->visitorEmail)] : [],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.admin-alert');
    }
}