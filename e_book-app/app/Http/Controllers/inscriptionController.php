<?php

namespace App\Http\Controllers;

use App\Models\Clients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\returnValueMap;



class inscriptionController extends Controller
{
    //
    public function inscrire(Request $Request){
        if ($Request->input('password') === $Request->input('confirm_password')) {
            $hashedPassword = Hash::make($Request->input('password'));
        
            $Clients = Clients::create([
                'nom_prenom' => $Request->input('nom_prenom'),
                'telephone' => $Request->input('telephone'),
                'email' => $Request->input('email'),
                'password' => $hashedPassword,
            ]);
        return view('connexion');
           
        } else {
            return redirect()->back()->with('error', 'Les mots de passe ne correspondent pas.');
        }
    }




    // public function connect(Request $request)
// {
    // Récupérez les identifiants saisis dans le formulaire de connexion
    // $credentials = $request->only('email', 'password');

    // est une méthode fournie par Laravel pour tenter d'authentifier un utilisateur en utilisant le garde (dans config.auth.php)spécifique que vous avez défini dans votre application.
    // if (Auth::guard('clients')->attempt($credentials)) {
        // Authentification réussie, redirigez l'utilisateur vers la page souhaitée
        // return redirect()->route('index')->with('success', 'Connexion réussie !');
    // } else {
        // Identifiants incorrects, redirigez l'utilisateur avec un message d'erreur
    //     return redirect()->route('connexion')->with('error', 'Adresse email ou mot de passe incorrect.');
    // }
// }
public function connect(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::guard('clients')->attempt($credentials)) {
        $user = Auth::guard('clients')->user(); // Récupère l'utilisateur authentifié
        $clientName = $user->nom_prenom; // Récupère le nom_prenom du client connecté

        $request->session()->put('client_name', $clientName); // Stocke le nom_prenom du client en session

        return redirect()->route('index')->with('success', 'Connexion réussie !');
    } else {
        return redirect()->route('connexion')->with('error', 'Adresse email ou mot de passe incorrect.');
    }
}

   





    public function client()
    {
        $clients = Clients::all();
        return view('client', ['clients' => $clients]);
    }
    



    
    public function supprimer($id)
    {
        $clients = Clients::find($id);
        if ($clients) {
            $clients->delete();
            return redirect('client')->with('success', 'Donnée supprimée avec succès.');
        } else {
            return redirect('client')->with('error', 'Donnée non trouvée.');
        }
    }
}
