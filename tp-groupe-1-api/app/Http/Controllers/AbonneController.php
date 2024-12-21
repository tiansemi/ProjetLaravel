<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Abonne;

class AbonneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Abonne::all(), 200);
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
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:abonnes',
            'contact' => 'required|string',
            'statut' => 'boolean',
        ]);

        $abonne = Abonne::create($validated);
        return response()->json($abonne, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $abonne = Abonne::find($id);
        if (!$abonne) {
            return response()->json(['error' => 'Abonné non trouvé'], 404);
        }
        return response()->json($abonne, 200);
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
        $abonne = Abonne::find($id);
        if (!$abonne) {
            return response()->json(['error' => 'Abonné non trouvé'], 404);
        }

        $validated = $request->validate([
            'nom' => 'sometimes|string',
            'prenom' => 'sometimes|string',
            'email' => 'sometimes|email|unique:abonnes,email,' . $abonne->id,
            'contact' => 'sometimes|string',
            'statut' => 'boolean',
        ]);

        $abonne->update($validated);
        return response()->json($abonne, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $abonne = Abonne::find($id);
        if (!$abonne) {
            return response()->json(['error' => 'Abonné non trouvé'], 404);
        }

        $abonne->delete();
        return response()->json(['message' => 'Abonné supprimé'], 200);
    }

    public function abonnesComptes()
    {
        $abonnes = Abonne::with('comptes')->get();
        return response()->json($abonnes, 200);
    }

    public function detailAbonneComptes($id)
    {
        $abonne = Abonne::with('comptes')->find($id);
        if (!$abonne) {
            return response()->json(['error' => 'Abonné non trouvé'], 404);
        }
        return response()->json($abonne, 200);
    }
}
