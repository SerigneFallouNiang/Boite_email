<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;

Route::get('/', function () {
    return view('welcome');
});


Route::resources([
    'categories' => CategorieController::class,
    'commentaires' => CommentaireController::class,
    'idees' => IdeeController::class,
]);
Route::resource('idees', IdeeController::class);