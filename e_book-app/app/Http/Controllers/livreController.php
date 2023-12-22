<?php

namespace App\Http\Controllers;


use App\Models\Livres;
use Illuminate\Http\Request;

class livreController extends Controller
{
    //
    public function livrable(Request $Request){
        //dd($request->all()); Vérifiez si les données sont correctement reçues

         // Validez les données du formulaire
         $validatedData = $Request->validate([
            'titre' => 'required',
            'description' => 'required',
            'prix_livre' => 'required',
            'auteur' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Enregistrez les données dans la table de cours
        $livre = new Livres;
        $livre->titre = $validatedData['titre'];
        $livre->description = $validatedData['description'];
        $livre->prix_livre = $validatedData['prix_livre'];
        $livre->auteur = $validatedData['auteur'];

        // Téléchargez et stockez l'image
        $image_path = $Request->file('image_path')->store('livre_images', 'public');
       
        
        $livre->image_path = $image_path;
    
        $livre->save();

        return view ("livre");
    }


    public function livres()
    {
        $livres = Livres::all();
        return view('index', ['livres' => $livres]);
    }
    public function livress()
    {
        $livres = Livres::all();
        return view('historique_livre', ['livres' => $livres]);
        // Methode pour afficher historique de livre

    }



    public function supprimer($id)
    {
        $livre = Livres::find($id);
        if ($livre) {
            $livre->delete();
            return redirect('historique_livre')->with('success', 'Donnée supprimée avec succès.');
        } else {
            return redirect('historique_livre')->with('error', 'Donnée non trouvée.');
        }
    }
    
    
    
    
    
    
    
}
