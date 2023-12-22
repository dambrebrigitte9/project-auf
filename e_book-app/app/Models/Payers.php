<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payers extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_number', 
        'montant',
        'expiry_date',
        'cvv',
        'name_on_card',

       
    ];
}
