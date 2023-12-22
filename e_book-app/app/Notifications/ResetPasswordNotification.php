<?php
// Emplacement : app/Notifications/ResetPasswordNotification.php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
{
    $url = route('password.reset', [
        'token' => $this->token,
        'email' => urlencode($notifiable->getEmailForPasswordReset())
    ]);

    return (new MailMessage)
        ->from('dambrebrigitte9@gmail.com', 'Service E_book internationnal')
        ->subject('Réinitialisation de mot de passe')
        ->line('Vous recevez cet email car nous avons reçu une demande de réinitialisation de mot de passe pour votre compte.')
        ->action('Réinitialiser le mot de passe', $url)
        ->line('Si vous n\'avez pas demandé de réinitialisation de mot de passe, aucune autre action n\'est nécessaire.');
}



}
