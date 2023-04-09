<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;
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

Route::get('/', function () {
    return view('welcome');
});

//Routes des annonces

// Route::get("/annonces/creer", [AnnonceController::class, "create"])->name("annonce.create");