<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
      /* Aquí a la Vista le estoy pasando la variable "posts", que es esa misma de abajo que está entre comillas.
       Justo aquí se hace la consulta a BD y le informo de que quiero paginación. */
      return view("posts.index",["posts" => Post::latest()->paginate()
      ]);
    }
}
