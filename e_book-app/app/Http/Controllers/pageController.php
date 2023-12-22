<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class pageController extends Controller
{
    //
    public function index(){
        return view ("index");
    }

    public function inscription(){
       
        return view ("inscription");
    }
    public function connexion(){
        return view ("connexion");
    }
    

    public function panier(){
        return view ("panier");
    }

    public function livre(){
        return view ('livre');
    }
    // public function client(){
    //     return view ('client');
    // }

    public function historique_livre(){
        return view ('historique_livre');
    }







    public function profil(){
        Auth::guard('clients')->logout(); // Déconnexion de l'utilisateur authentifié

        // Supprimer le nom du client de la session
        session()->forget('client_name');
    
        return redirect()->route('index')->with('success', 'Déconnexion réussie !');
    }








}
