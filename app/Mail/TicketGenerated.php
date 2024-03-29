<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketGenerated extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $event;
    public $category_name;
    /**
     * Create a new message instance.
     */
    public function __construct(Ticket $ticket, $event, $category_name)
    {
        $this->ticket = $ticket;
        $this->event = $event;
        $this->category_name = $category_name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Ticket for the event : ' . $this->event->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.ticket',
            with: [
                'ticket' => $this->ticket,
                'event' => $this->event,
                'category_name' => $this->category_name
            ],
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
