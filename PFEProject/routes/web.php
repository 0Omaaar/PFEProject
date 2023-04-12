<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\HomeController;

include_once 'auth.php';


Route::get('/', [AnnonceController::class, 'index'])->name('annonces.index');
Route::get('/annonces/ajouter', [AnnonceController::class, 'create'])->name('annonces.ajouter');
Route::get('/annonces/{annonce}', [AnnonceController::class, 'show'])->name('annonces.show');
Route::post('/annonces/creer', [AnnonceController::class, 'store'])->name('annonces.store');
