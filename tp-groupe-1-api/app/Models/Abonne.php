<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonne extends Model
{
    use HasFactory;

    public function comptes(){
        return $this->hasMany(Compte::class);
    }
    
    // Autres propriétés et méthodes...
}
