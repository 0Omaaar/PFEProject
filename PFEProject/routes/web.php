<?php

use App\Http\Controllers\AAnnonceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\HomeController;

include_once 'auth.php';

//Routes des annonces
Route::put('/annonces/{annonce}', [AnnonceController::class, 'update'])->name('annonces.update');

Route::get('/', [AnnonceController::class, 'index'])->name('annonces.index');
Route::get('/annonces/ajouter', [AnnonceController::class, 'create'])->name('annonces.ajouter');
Route::get('/annonces/modifier/{annonce}', [AnnonceController::class, 'edit'])->name('annonces.modifier');
Route::get('/annonces/{annonce}', [AnnonceController::class, 'show'])->name('annonces.show');
Route::post('/annonces/creer', [AnnonceController::class, 'store'])->name('annonces.store');
Route::delete('/annonces/{annonce}', [AnnonceController::class, 'destroy'])->name('annonces.supprimer');