<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;

Route::get('/', function () {
    return view('welcome');
});


Route::resources([
    'categories' => CategorieController::class,
    'commentaires' => CommentaireController::class,
    'idees' => IdeeController::class,
]);
