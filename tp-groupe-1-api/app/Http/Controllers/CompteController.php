<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Abonne;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Compte::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'abonne_id' => 'required|exists:abonnes,id',
            'libelle' => 'required|string',
            'description' => 'string|nullable',
            'banque' => 'required|string|max:5',
            'agence' => 'required|string|max:5',
            'numerocompte' => 'required|string|max:11',
            'clerib' => 'required|string|max:2',
            'montant' => 'numeric',
            'domiciliation' => 'string|nullable',
            'statut' => 'boolean',
        ]);

        $compte = Compte::create($validated);
        return response()->json($compte, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $compte = Compte::find($id);
        if (!$compte) {
            return response()->json(['error' => 'Compte non trouvé'], 404);
        }
        return response()->json($compte, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $compte = Compte::find($id);
        if (!$compte) {
            return response()->json(['error' => 'Compte non trouvé'], 404);
        }

        $validated = $request->validate([
            'libelle' => 'sometimes|string',
            'description' => 'sometimes|string|nullable',
            'banque' => 'sometimes|string|max:5',
            'agence' => 'sometimes|string|max:5',
            'numerocompte' => 'sometimes|string|max:11',
            'clerib' => 'sometimes|string|max:2',
            'montant' => 'numeric',
            'domiciliation' => 'string|nullable',
            'statut' => 'boolean',
        ]);

        $compte->update($validated);
        return response()->json($compte, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $compte = Compte::find($id);
        if (!$compte) {
            return response()->json(['error' => 'Compte non trouvé'], 404);
        }

        $compte->delete();
        return response()->json(['message' => 'Compte supprimé'], 200);
    }

    public function searchByIban($iban)
    {
        $compte = Compte::whereRaw("CONCAT(banque, agence, numerocompte, clerib) = ?", [$iban])->first();
        if (!$compte) {
            return response()->json(['error' => 'Compte non trouvé avec cet IBAN'], 404);
        }
        return response()->json($compte, 200);
    }

    public function stats()
    {
        $stats = [
            'nombre_comptes' => Compte::count(),
            'nombre_abonnes' => Abonne::count(),
            'somme_total_montant' => Compte::sum('montant'),
            'montant_minimum' => Compte::min('montant'),
            'montant_maximum' => Compte::max('montant'),
            'montant_moyen' => Compte::avg('montant'),
        ];

        return response()->json($stats, 200);
    }

}
