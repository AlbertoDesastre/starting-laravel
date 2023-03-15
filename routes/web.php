<?php

/* use Illuminate\Http\Request; */
use Illuminate\Support\Facades\Route;

/*
Route::get | post | delete | put
*/

Route::get('/', function () {
    return view('home');
});

Route::get('blog', function () {
    /* Se supone que esta variable $posts simula un llamado a una API */
    $posts = [
        ["id"=>1, "title"=>"Cute cat", "slug"=>"PHP"],
        ["id"=>2, "title"=>"Perro feo", "slug"=>"Laravel"]
    ];

    /* Argumentos --> 
    "blog" como la vista que se va a renderizar.
    "posts" con comillas, como el nombre de la variable que va a recibir
    *último argumento* como la variable que va a ingresar. En este caso un array asociativo.
    */

    return view("blog", ["posts" => $posts]);
});

Route::get('blog/{slug}', function ($slug) {
    // consulta a base de datos
    $post = $slug;
     
    return view("post", ["post" => $post]);
});

/* Route::get('buscar', function (Request $request) {
    return $request->all();
}); */