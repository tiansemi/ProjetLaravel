<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abonne extends Model
{
    use HasFactory;

    public function comptes(){
        return $this->hasMany(Compte::class);
    }
    protected $fillable = ['nom', 'prenom', 'email', 'contact', 'statut'];
    // Autres propriétés et méthodes...
}
