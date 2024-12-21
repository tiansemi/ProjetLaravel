<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    public function abonne(){
        return $this->belongsTo(Abonne::class);
    }
    protected $fillable = ['abonne_id','libelle','description','banque','agence','numerocompte','clerib','montant','domiciliation','statut'];
    // Autres propriétés et méthodes...
}
