<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personne extends Model
{
    use HasFactory;

    protected $fillable = ['nom','prenom','genre','ville','pays','email','dateNaissance','contact','longitude','latitude','nationnalite','regions'];
    protected $casts = ['regions' => 'array',]; // Convertit automatiquement JSON en tableau
    // Autres propriétés et méthodes...
}
