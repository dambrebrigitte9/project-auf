<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livres extends Model
{
    use HasFactory;
    protected $table = 'Livres'; // Assurez-vous que le nom de la table est correct

    protected $fillable = [
        'titre', 
        'description',
        'prix_livre',
        'auteur',
        'image_path',

       
    ];
}
