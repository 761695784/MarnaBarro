<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Http\Controllers\CommentController;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;


Route::get('/liste', [ BienController:: class,'liste' ]);
Route::get('/', [ BienController:: class,'liste' ]);

Route::get('/modifier_bien/{id}', [BienController::class, 'modifier_bien']);

Route::POST('/modifier/traitement', [BienController::class, 'modifier_traitement']);

Route::get('/supprimer_bien/{id}', [BienController::class, 'supprimer_bien']);

Route::get('/details/{id}', [BienController::class, 'details'])->name('details');

Route::post('/comments/store', [CommentController::class, 'store'])->name('comments.store');

Route::get('/comments{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');

Route::post('update/comment/{comment}', [CommentController::class, 'update'])->name('comments.update');

Route::get('/comments{comment}/destroy', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('bien',[BienController::class,'afficher_biens']);

Route::get('/ajouter',[BienController::class,'ajouter_biens']);

Route::post('sauvegarde',[BienController::class,'sauvegarder']);

// La route pour l'authentification  
Route::get('/register',[AuthController::class,'register'])->name('register');

Route::post('/register',[AuthController::class,'registerPost'])->name('register');

Route::get('/login',[AuthController::class,'login'])->name('login');


Route::post('/login',[AuthController::class,'loginpost'])->name('login');

Route::delete('/logout',[AuthController::class,'logout'])->name('logout');

