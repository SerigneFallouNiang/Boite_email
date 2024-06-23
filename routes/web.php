<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('welcome');
});


Route::resources([
    'categories' => CategorieController::class,
    'commentaires' => CommentaireController::class,
    'idees' => IdeeController::class,
]);


Route::get('/categorie/{id}', [IdeeController::class, 'filtrerParCategorie'])->name('idees.categorie')->where('id', '[0-9]+');



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// Dans routes/web.php
Route::post('/idees/{idee}/accepter', [IdeeController::class, 'accepter'])->name('idees.accepter');
Route::post('/idees/{idee}/refuser', [IdeeController::class, 'refuser'])->name('idees.refuser');


Route::get('/login', [RegisterController::class, 'showLoginForm'])->name('login');
Route::post('/login', [RegisterController::class, 'login']);
Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');