<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Http\Controllers\CommentController;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;


                // Routes du CRUD des BIENS

            //Route pour afficchage de la liste des biens à l'entrée du site sans pour autant s'etre authentifié
             Route::get('/', [ BienController:: class,'liste' ]);

            //Route d'acces a la liste de tous les biens apres authentification avec les avantages du CRUD
             Route::get('/liste', [ BienController:: class,'liste' ]);

            //Route d'afficchage des biens  depuis la base de données 
             Route::get('bien',[BienController::class,'afficher_biens']);

            //Route pour l'affichage du formulaire d'ajout de bien
             Route::get('/ajouter',[BienController::class,'ajouter_biens']);

            //Route pour la sauvegarde d'un bien qui a ete soumis dans le formulaire d'ajout 
             Route::post('sauvegarde',[BienController::class,'sauvegarder']);

            //Route pour l'afficchage de la liste du formulaire de modification lorsqu'on connait l'id du bien
             Route::get('/modifier_bien/{id}', [BienController::class, 'modifier_bien']);

            //Route pour le traitement du formulaire de modification a savoir les validations et l'enregistrement et le message de succes d'enregistrement
             Route::POST('/modifier/traitement', [BienController::class, 'modifier_traitement']);

            //Route pour la suppression lorsqu'on connait l'id du bien
             Route::get('/supprimer_bien/{id}', [BienController::class, 'supprimer_bien']);

            //Route pour la vue des details d'un bien a partir de son id  
             Route::get('/details/{id}', [BienController::class, 'details'])->name('details');



                //Route pour le CRUD des COMMENTAIRES


            //Route pour l'ajout d'un commentaire dans un bien specifique
            Route::post('/comments/store', [CommentController::class, 'store'])->name('comments.store');

            //Route pour l'affichage du formulaire pour modification d'un commentaire connaissant son id
            Route::get('/comments{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');

            //Route pour l'enregistrement des modifications faites au niveau du formulaire
            Route::post('update/comment/{comment}', [CommentController::class, 'update'])->name('comments.update');

            //Route pour la Suppression d'un commentaire
            Route::get('/comments{comment}/destroy', [CommentController::class, 'destroy'])->name('comments.destroy');




             //Partie Authentification

            // La route pour l'authentification a savoir le formulaire de connexion
            Route::get('/login',[AuthController::class,'login'])->name('login');

            //Route pour la verification des informations soumis dans le formulaire de connexion
            Route::post('/login',[AuthController::class,'loginpost'])->name('login');

            //Route pour l'affichage du formulaire d'inscription
            Route::get('/register',[AuthController::class,'register'])->name('register');

            //Route pour la sauvegarde , l'enregistrement d'un nouveau utilisateur
            Route::post('/register',[AuthController::class,'registerPost'])->name('register');

            //Route pour la deconnexion de l'utilisateur
            Route::delete('/logout',[AuthController::class,'logout'])->name('logout');

