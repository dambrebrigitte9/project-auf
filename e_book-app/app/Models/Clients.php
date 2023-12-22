<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification; // Importez la classe de notification personnalisée


class Clients extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nom_prenom', 
        'telephone',
        'email',
        'password',
        'confirm_password',
    ];
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function getEmailForPasswordReset()
    {
        return $this->email;
    }
}
