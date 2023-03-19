<?php

//Esto es la ruta de acceso a este controlador. Muy distinto a Javascript.
// Hay que copiar y pegar esto, copiando el nombre del controlador al final, para acceder a él.
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function blog()
    {
        /* Eloquent es una tecnologia ORM, solo que en Laravel se llama de esa forma.
        Permite acceder a las clases de Laravel como si fuesen objetos.
        
        ORM: 
        */
        
        // Diferentes métodos del ORM listados aquí abajo:
        // $posts = Post::get();
        // $post = Post::first();
        // $post = Post::find(25);

        //dd($post);

        $posts = Post::latest()->paginate();

        dd($posts);

        /* Argumentos --> 
        "blog" como la vista que se va a renderizar.
        "posts" con comillas, como el nombre de la variable que va a recibir
        *último argumento* como la variable que va a ingresar. En este caso un array asociativo.
        */

        return view("blog", ["posts" => $posts]);
    }

    public function post(Post $post)
    {
       return view("post", ["post" => $post]);
    }
}


