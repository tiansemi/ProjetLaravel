<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Personne;

class PersonneController extends Controller
{
    public function aleatoire()
    {
        // API RANDOMUSER
        $response = Http::get('https://randomuser.me/api');
        $user = $response->json()['results'][0];

        // API ADMINISTRATIVE-DIVISION-DB
        $nationnalite = strtoupper(substr($user['nat'], 0, 2));
        $divisionResponse = Http::get("https://rawcdn.githack.com/kamikazechaser/administrative-divisions-db/master/api/{$nationnalite}.json");
        $regions = $divisionResponse->json();

        // Enregistrement dans la table personnes
        $personne = Personne::create([
            'nom' => $user['name']['last'],
            'prenom' => $user['name']['first'],
            'genre' => $user['gender'] === 'male' ? 'M' : 'F',
            'ville' => $user['location']['city'],
            'pays' => $user['location']['country'],
            'email' => $user['email'],
            'dateNaissance' => $user['dob']['date'],
            'contact' => $user['phone'],
            'longitude' => $user['location']['coordinates']['longitude'],
            'latitude' => $user['location']['coordinates']['latitude'],
            'nationnalite' => $nationnalite,
            'region' => implode(', ', $regions['regions'] ?? []),
        ]);

        return response()->json($personne, 200);
    }
}
