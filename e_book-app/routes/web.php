<?php

use App\Http\Controllers\empruntController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\livreController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\panierController;
use App\Http\Controllers\inscriptionController;
use App\Http\Controllers\paiementController;
use App\Http\Controllers\PasswordResetController;

/* Route creer par laravel breeze*/

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/* Route pour mes pages */
Route::get('/index', [pageController::class,'index'])->name('index');
Route::get('/inscription', [pageController::class,'inscription'])->name('inscription');
Route::get('/connexion', [pageController::class,'connexion'])->name('connexion');
Route::get('profil', [pageController::class,'profil'])->name('profil');
Route::get('panier', [pageController::class,'panier'])->name('panier');
Route::get('livre', [pageController::class,'livre'])->name('livre');
// Route::get('client', [pageController::class,'client'])->name('client');
Route::get('historique_livre', [pageController::class,'historique_livre'])->name('historique_livre');



/* Route pour le formulaire d'inscription */
Route::post('/inscrire',[inscriptionController::class,'inscrire']);
Route::post('/connect',[inscriptionController::class,'connect'])->name('connect');
Route::delete('/client/{id}',  [inscriptionController::class, 'supprimer'])->name('dealer');



/* Route pour le formulaire des livres */
Route::post('/livrable',[livreController::class,'livrable'])->name('livrable');
Route::get('/', [livreController::class,'livres']);
Route::get('/index', [livreController::class,'livres'])->name('index');
Route::delete('/livre/{id}',  [livreController::class, 'supprimer'])->name('deal');



/* Route pour afficher historique de livres */
Route::get('/historique_livre', [livreController::class, 'livress'])->name('historique_livre');


/* Route pour afficher historique des client */
Route::get('client', [inscriptionController::class,'client'])->name('client');


/* Route pour vider le  panier  */
Route::get('/videpanier', function(){
    Cart::destroy();
});

/* Route pour ajouter  un produit au panier  */
Route::post('/panier', [panierController::class,'panier'])->name('panier');
Route::get('/afficherpanier', [panierController::class,'afficherpanier']);
Route::delete('/panier/{rowId}', [panierController::class,'destroy'])->name('destroy');



/* Route pour alle a la paiement  */
Route::post('/paiement', [paiementController::class,'paiement'])->name('paiement');
Route::post('/paye', [paiementController::class,'paye'])->name('paye');
Route::get('/afficher_paye', [paiementController::class,'afficher_paye'])->name('afficher_paye');


/* Route pour supprimer un paiement a la paiement  */
Route::delete('{id}',  [paiementController::class, 'delete'])->name('delete');




/* Route pour les emprunt des livres  */
Route::get('emprunt', [empruntController::class,'emprunt'])->name('emprunt');


/* Route pour mot de passe oublie */
Route::get('request', [PasswordResetController::class,'request'])->name('request');
Route::post('sendResetLinkEmail', [PasswordResetController::class,'sendResetLinkEmail'])->name('sendResetLinkEmail');
Route::get('essai', [PasswordResetController::class,'essai'])->name('essai');


Route::get('password/reset/{token}/{email}', [PasswordResetController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [PasswordResetController::class,'update'])->name('password.update');

// Route::get('password/reset/{token}', 'PasswordResetController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'PasswordResetController@reset')->name('password.update');