<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    private $token;


    /**
     * Create a new message instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Password Reset Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    public function toMail( $notifiable)
    {
        $frontendUrl = env('FRONTEND_URL', 'http://localhost:5173/'); // Usa la URL de tu frontend
        $url = $frontendUrl . 'auth/restablecer?token=' . $this->token . '&email=' . urlencode($notifiable->email);

        return (new MailMessage)
        ->subject('Restablecer contraseña')
                    ->line('Estás recibiendo este correo porque solicitaste un restablecimiento de contraseña.')
                    ->action('Notification Action', $url);
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
