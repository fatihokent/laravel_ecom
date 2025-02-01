<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view("layouts.app");
});
Route::resource('clients', ClientController::class);
Route::resource('produits', ProductController::class);
Route::resource('commandes', CommandeController::class);
Route::get('/search/produits', [ProductController::class, 'search'])->name('produits.search');
Route::get('/facture/{id}', [CommandeController::class, 'facture'])->name('commandes.facture');