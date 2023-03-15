<?php

//Esto es la ruta de acceso a este controlador. Muy distinto a Javascript.
// Hay que copiar y pegar esto, copiando el nombre del controlador al final, para acceder a él.
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function blog()
    {
        /* Se supone que esta variable $posts simula un llamado a una API */
        $posts = [
            ["id"=>1, "title"=>"Cute programming language", "slug"=>"PHP"],
            ["id"=>2, "title"=>"Cute framework", "slug"=>"Laravel"]
        ];

        /* Argumentos --> 
        "blog" como la vista que se va a renderizar.
        "posts" con comillas, como el nombre de la variable que va a recibir
        *último argumento* como la variable que va a ingresar. En este caso un array asociativo.
        */

        return view("blog", ["posts" => $posts]);
    }

    public function post($slug)
    {
       // consulta a base de datos
       $post = $slug;
     
       return view("post", ["post" => $post]);
    }
}
