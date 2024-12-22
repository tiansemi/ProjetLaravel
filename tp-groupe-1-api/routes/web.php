<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbonneController;
use App\Http\Controllers\CompteController;

Route::get('/', function () {
    return view('welcome');
});
/*// Routes pour les abonnés
Route::apiResource('abonnes', AbonneController::class);

// Routes pour les comptes
Route::apiResource('comptes', CompteController::class);

// Routes spécifiques
Route::get('abonnes/comptes', [AbonneController::class, 'abonnesComptes']);
Route::get('abonnes/{id}/comptes', [AbonneController::class, 'detailAbonneComptes'])->where('id', '[0-9]+');
Route::get('comptes/iban/{iban}', [CompteController::class, 'searchByIban']);
Route::get('stats', [CompteController::class, 'stats']);
*/