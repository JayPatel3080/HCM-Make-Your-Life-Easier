<?php

namespace App\Mail;

use App\Models\Appointments;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentStatusChangeNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;
    public $user;

    public function __construct(Appointments $appointment, User $user)
    {
        $this->appointment = $appointment;
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Appointment Status Change Notification')
                    ->view('emails.appointment_status_change_notification');
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Appointment Status Change Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.appointment_status_change_notification',
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
