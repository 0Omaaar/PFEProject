<?php

use App\Http\Controllers\AAnnonceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;

include_once 'auth.php';

//Routes des annonces
Route::get('/', [AnnonceController::class, 'index'])->name('annonces.index');

Route::get('/annonces/recherche', [AnnonceController::class, 'search'])->name('annonces.recherche');

Route::get('/annonces/ajouter', [AnnonceController::class, 'create'])->name('annonces.ajouter');
Route::post('/annonces/creer', [AnnonceController::class, 'store'])->name('annonces.store');

Route::get('/annonces/{annonce}', [AnnonceController::class, 'show'])->name('annonces.show');

Route::get('/annonces/modifier/{annonce}', [AnnonceController::class, 'edit'])->name('annonces.modifier');
Route::put('/annonces/{annonce}', [AnnonceController::class, 'update'])->name('annonces.update');

Route::delete('/annonces/{annonce}', [AnnonceController::class, 'destroy'])->name('annonces.supprimer');


//Routes de la page de profile
Route::get('/profil/profil', [ProfilController::class, 'show'])->name('profil.show');
Route::put('/profil/modifier', [ProfilController::class, 'update'])->name('profil.update');


//Routes d'admin
Route::middleware(['auth', 'admin'])->group(function(){
    //Routes des utilisateurs
    Route::get('/admin/users', [UsersController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/{user}/rendreAdmin', [UsersController::class, 'rendreAdmin'])->name('users.rendreAdmin');
    Route::post('/admin/users/{user}/rendreNormal', [UsersController::class, 'rendreNormal'])->name('users.rendreNormal');

    //Routes des annonces 
    Route::get('/admin/annonces', [AAnnonceController::class, 'index'])->name('admin.index');
    Route::get('/admin/annonces/{annonce}', [AAnnonceController::class, 'show'])->name('admin.afficher_annonce');
    Route::post('/admin/annonces/{annonce}/activer', [AAnnonceController::class, 'activer'])->name('admin.activer');
    Route::post('/admin/annonces/{annonce}/desactiver', [AAnnonceController::class, 'desactiver'])->name('admin.desactiver');
});
