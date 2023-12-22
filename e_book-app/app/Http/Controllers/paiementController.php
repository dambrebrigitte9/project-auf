<?php

namespace App\Http\Controllers;

use App\Models\Payers;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class paiementController extends Controller
{
    //
    public function paiement() {
        if (Cart::count() <= 0) {
            return view('panier.index');
        }
        else{
            return view('paiement.index');

        }
        
    }   
    
    
    public function paye(Request $Request ){
        Payers::create([
            'card_number'=>$Request->input('card_number'),
            'montant'=>$Request->input('montant'),
            'expiry_date'=>$Request->input('expiry_date'),
            'cvv'=>$Request->input('cvv'),
            'name_on_card'=>$Request->input('name_on_card'),
        ]);
        
        return redirect()->route('index')->with('success', 'le produit a ete payer');
    }



    public function afficher_paye(){
        $payers = Payers::all();
        return view('afficher_paye', compact('payers'));

    }


    public function delete($id)
    {
        $payes = Payers::find($id);
        if ($payes) {
            $payes->delete();
            return redirect('afficher_paye')->with('success', 'Donnée supprimée avec succès.');
        } else {
            return redirect('afficher_paye')->with('error', 'Donnée non trouvée.');
        }
    }
    

}
