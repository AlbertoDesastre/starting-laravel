<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
En este caso, lo que va justo después de PageController::class es el nombre del método al que se tiene que acceder.
*/

// Para no escribir el controlador en cada linea podemos juntarlo todo en un grupo.
Route::controller(PageController::class)->group(function () {
    /* El primer argumento de la Route es la dirección de la página, y el segundo argumento el nombre del método, que viene deL PageController */
    Route::get('/', 'home')->name("home");
    Route::get('blog','blog')->name("blog");
    // OJO, porque antes estaba solo con {slug}. Ahora accedo a la PROPIEDAD SLUG, que trae POST
    Route::get('blog/{post:slug}','post')->name("post");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
