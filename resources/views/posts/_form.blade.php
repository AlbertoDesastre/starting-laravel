@csrf

<label class="uppercase text-gray-700 text-xs">Title</label>
<input type="text" name="title" class="rounded border-gray-200 w-full mb-4" value="{{$post->title}}">

<label class="uppercase text-gray-700 text-xs">Body</label>
<textarea name="body" rows="5" class="rounded border-gray-200 w-full mb-4">{{$post->body}}</textarea>

<div class="flex justify-between items-center">
  <a href="{{ route('posts.index') }}" class="text-indigo-600" >Back</a>

  <input type="submit" value="Send" class="bg-gray-800 text-white rounded px-4 py-2" >
</div>
