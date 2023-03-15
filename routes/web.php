<?php

/* use Illuminate\Http\Request; */
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
En este caso, lo que va justo después de PageController::class es el nombre del método al que se tiene que acceder.
*/

/* 
Route::get('/', [PageController::class, 'home'])->name("home");

Route::get('blog',[PageController::class, 'blog'])->name("blog");

Route::get('blog/{slug}', [PageController::class, 'post'])->name("post");
 */

// Para no escribir el controlador en cada linea podemos juntarlo todo en un grupo. 
Route::controller(PageController::class)->group(function () {

    Route::get('/', 'home')->name("home");

    Route::get('blog','blog')->name("blog");
    
    Route::get('blog/{slug}','post')->name("post");

});