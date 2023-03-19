@extends("template")

@section("content")
    <h1>List of posts</h1>

    @foreach ($posts as $post)
      <p>
        <strong> {{ $post->id }} <strong>
        <!-- OJO! Aquí abajo, la variable $post no se si hace referencia al nombre de la RUTA 
        o a la VARIABLE post que se encuentra dentro de esa ruta -->  
        <a href="{{ route('post', $post->slug) }}"> 
          {{ $post->title }} 
        </a>
      </p>
    @endforeach 
    
    {{$posts->links()}}
@endsection