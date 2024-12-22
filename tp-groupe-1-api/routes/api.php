<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\AbonneController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\PersonneController;

Route::prefix('v1')->group(function () {
    // Routes pour les abonnés
    Route::apiResource('abonnes', AbonneController::class);

    // Routes pour les comptes
    Route::apiResource('comptes', CompteController::class);

    // Routes spécifiques
    Route::get('abonnes/comptes', [AbonneController::class, 'abonnesComptes']);
    Route::get('abonnes/{id}/comptes', [AbonneController::class, 'detailAbonneComptes']);
    Route::get('comptes/iban/{iban}', [CompteController::class, 'searchByIban']);
    Route::get('personnes/aleatoires', [PersonneController::class, 'aleatoire']);
    Route::get('stats', [CompteController::class, 'stats']);

});
