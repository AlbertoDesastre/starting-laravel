<?php

namespace App\Http\Controllers;
//Imports de mis cosillas
use App\Models\Post;

//Imports del Framework
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
      /* Aquí a la Vista le estoy pasando la variable "posts", que es esa misma de abajo que está entre comillas.
       Justo aquí se hace la consulta a BD y le informo de que quiero paginación. */
      return view("posts.index",["posts" => Post::latest()->paginate()
      ]);
    }

    public function create(Post $post){
        return view("posts.create", ["post" => $post]);
    }

    // Como necesito recuperar lo que me envía un usuario lo recupero con Request
    public function store(Request $request){
        // La validación básica proviene de la Clase request. Se le pasa las variables a validar y el nombre de la validación.
        $request->validate([
            "title" => 'required',
            // quiero que sea único, específicamente en la tabla post, específicamente la columna slug
            "slug" => "required|unique:posts,slug" ,
            "body" => "required"
        ]);
        // Desarrollo el post a partir del user que se encuentra logeado. Esa info del user se encuentra dentro de la clase Request.
        /* OJO! En el momento en el que escribo este comentario el método "posts" no existe en el modelo Usuario.
        Esto significa que cuando intente acceder a ese método saltará un error. Es tan sencillo como incluir ahora el método
        al que intento acceder un poco más abajo. */
        $post = $request->user()->posts()->create([
            "title" => $request->title,
            // Aqui vuelvo a utilizar el helper Str para hacer una URL amigable. Siempre que uso un
            // helper de este tipo tengo que importarlo.
            "slug" => $request->slug,
            "body" => $request->body
        ]);

        /* Ojo al detalle! Primero salvo la información y LUEGO redirecciono. */

        return redirect()->route("posts.edit", $post);
    }

    public function edit(Post $post) {
        return view("posts.edit", ["post" => $post]);
    }

    public function update(Request $request, Post $post){
        $request->validate([
            "title" => 'required',
            // "Revisa esta validación pero ignórame al mismo tiempo"
            "slug" => "required|unique:posts,slug," . $post->id,
            "body" => "required"
        ]);

        $post -> update([
            "title" => $request->title,
            "slug" => $request->slug,
            "body" => $request->body
        ]);

        return redirect()->route("posts.edit", $post);
    }

    public function destroy(Post $post){
      $post->delete();

      return back();
    }
}
