<?php

namespace App\Http\Controllers;

use App\Models\Livres;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;


class panierController extends Controller
{
    //
    public function panier(Request $request){
        // dd($request->id, $request->titre, $request->description, $request->prix_livre, $request->auteur);

        // Vérifie si l'utilisateur est connecté

        if (Auth::guard('clients')->check()) {


           $duplicate = Cart::search(function ($cartItem, $rowId)use ($request) {
            return $cartItem->id === (int)$request->livre_id;
            });



            if($duplicate->isNotEmpty()){
                return redirect()->route('index')->with('success', 'le produit a deja  ete ajouter');
            }
            $livre= Livres::find($request->livre_id);
            
            Cart::add([
            
            'id' => $livre->id, // ID unique de l'article
            'name' => $livre->titre, // Nom du produit
            'qty' => 1, // Quantité (vous pouvez ajuster cela selon vos besoins)
            'price' => $livre->prix_livre, // Prix
            'options' => [
                'description' => $livre->description, // Description de l'article
                'auteur' => $livre->auteur ,// Auteur de l'article
                'image_path' => $livre->image_path ,

            ]
        ]);
        
        return redirect()->route('index')->with('success', 'le produit a bien ete ajouter');
       
    } else {
        // Utilisateur non connecté, redirigez-le vers la page de connexion
        return redirect()->route('connexion')->with('error', 'Veuillez vous connecter pour ajouter au panier.');
    }

    }

    

    public function afficherpanier(){
        return view ('panier.index');
    }


    public function destroy($rowId){
        Cart::remove($rowId);
        return back()->with('succes',"le produit a ete supprimer du panier");
    }



    

}
