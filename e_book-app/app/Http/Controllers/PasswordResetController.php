<?php

namespace App\Http\Controllers;
use App\Models\Clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\View;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class PasswordResetController extends Controller
{
    public function request()
    {
        return view('request');
    }
    

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $request->only('email'),
            function ($clients, $token) {
                $clients->notify(new ResetPasswordNotification($token));
            }
        );

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return redirect()->back()->with('status', 'Un e-mail de réinitialisation a été envoyé. Veuillez vérifier votre boîte de réception.');
                case Password::INVALID_USER: // Utilisez INVALID_USER pour gérer les clients invalides
                    default:
                return view('essai')->with(['errors' => [$response]]);
        }
    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    
    public function showResetForm(Request $request, $token)
{
    $email = $request->email; // Utilisez cette méthode pour récupérer l'email
     //dd($email);  Vérifiez si l'email est correctement récupéré
    return view('auth.reset', ['token' => $token, 'email' => $email]);
}

    
    
    
    
// dd($request->all()) ;
public function update(Request $request)
{       
    // Validation des champs avec le Validator personnalisé
    $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
        'token' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Réinitialisation du mot de passe
    $response = $this->resetPassword($request);

    // Vérification de la réponse de resetPassword
    dd($response);

    if ($response == Password::PASSWORD_RESET) {
        return redirect()->route('connexion')->with('status', 'Votre mot de passe a été réinitialisé avec succès.');
    } else {
        return redirect()->back()->withErrors(['email' => __($response)]);
    }
}





protected function resetPassword(Request $request)
{       
    // Récupération du client à partir de l'email
    dd($request->email); // Ajout de cette ligne pour vérifier l'email transmis
$client = Clients::where('email', $request->email)->first();


    if ($client) {
        // Mise à jour du mot de passe du client
        $client->password = Hash::make($request->password);
        $client->setRememberToken(Str::random(60));

        // Sauvegarde du client
        if ($client->save()) {
            return Password::PASSWORD_RESET;
        } else {
            // En cas d'échec de sauvegarde
            return Password::INVALID_USER;
        }
    }

}

// ... Autres méthodes du contrôleur ...


    public function essai()
    {
        return view('essai');
    }

    public function broker()
    {
        return Password::broker('clients');
    }
}

