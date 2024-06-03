<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/liste', [ BienController:: class,'liste' ]);

Route::get('/modifier_bien/{id}', [BienController::class, 'modifier_bien']);

Route::POST('/modifier/traitement', [BienController::class, 'modifier_traitement']);