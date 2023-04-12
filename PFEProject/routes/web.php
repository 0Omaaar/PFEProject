<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\HomeController;
include_once 'auth.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });


// Route::get('/', [HomeController::class, 'index'])->name('index');


//Routes des annonces
// Route::middleware(['auth'])->group(function () {
    Route::get('/', [AnnonceController::class, 'index'])->name('annonces.index');
    Route::get('/annonces/ajouter', [AnnonceController::class, 'create'])->name('annonces.ajouter');
    Route::get('/annonces/{annonce}', [AnnonceController::class, 'show'])->name('annonces.show');
    Route::post('/annonces/creer', [AnnonceController::class, 'store'])->name('annonces.store');
// });