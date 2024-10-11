<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetNotification extends Notification
{
    use Queueable;

    private $token;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via( $notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
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
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
