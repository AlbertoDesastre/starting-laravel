<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Route::get | post | delete | put
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('prueba', function () {
    return "This a test route.";
});

Route::get('prueba/{dato}', function ($dato) {
    return "Te regalo tu $dato";
});

Route::get('buscar', function (Request $request) {
    return $request->all();
});
