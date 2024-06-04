<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/liste', [ BienController:: class,'liste' ]);

Route::get('/modifier_bien/{id}', [BienController::class, 'modifier_bien']);

Route::POST('/modifier/traitement', [BienController::class, 'modifier_traitement']);

Route::get('/supprimer_bien/{id}', [BienController::class, 'supprimer_bien']);

Route::get('/details/{id}', [BienController::class, 'details'])->name('details');

Route::post('/comments/store', [CommentController::class, 'store'])->name('comments.store');

Route::get('/comments{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');

Route::post('update/comment/{comment}', [CommentController::class, 'update'])->name('comments.update');

Route::get('/comments{comment}/destroy', [CommentController::class, 'destroy'])->name('comments.destroy');