<?php

use App\Http\Controllers\BienController;
use Illuminate\Support\Facades\Route;

Route::get('bien',[BienController::class,'afficher_biens']);

Route::get('/ajouter',[BienController::class,'ajouter_biens']);