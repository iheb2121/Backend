<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\CategorieController;
use App\http\Controllers\ScategorieController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// // route pour afficher toutes les categories .
// Route::get('/categories', [CategorieController::class , 'index']);
// //route post
// Route::post('/categories', [CategorieController::class , 'store']);
// //delete
// Route::delete('/categories/{id}', [CategorieController::class , 'destroy']);
// //chercher par id 
// Route::get('/categories/{id}', [CategorieController::class , 'show']);
// ///update
// Route::put('/categories/{id}', [CategorieController::class , 'update']);

Route::middleware('api')->group(function () {
    Route::resource('categories', CategorieController::class);
});


Route::middleware('api')->group(function () {
    Route::resource('Scategories', ScategorieController::class);
});


Route::get('/scat/{idcat}', [ScategorieController::class, 'showSCategorieByCAT']);


Route::middleware('api')->group(function () {
    Route::resource('Article', ArticleController::class);
});

Route::get('/listarticles/{idscat}', [ArticleController::class,'showArticlesBySCAT']);

Route::get('/articles/art/articlespaginate', [ArticleController::class,'articlesPaginate']);