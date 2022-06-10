@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="title">Add a title</label>
          <input type="text" class="form-control" id="title" placeholder="title..." name="title" value="{{ old('title', $post->title)}}">
        </div>
        <div class="form-group">
          <label for="category">Category</label>
          <select name="category_id" id="category">
              <option value="">Nessuna Categoria</option>
              @foreach ($categories as $category )
                  <option
                      @if( old( 'category_id', $post->category_id ) == $category->id ) selected @endif
                      value=" {{ $category->id }} "
                      >{{ $category->label }}</option>
              @endforeach
          </select>
      </div>
        <div class="form-group">
          <label for="content">Write the content of your post</label>
          <textarea class="form-control" id="content" rows="5" placeholder="A cosa stai pensando?" name="content">
            {{ old('content', $post->content)}}
          </textarea>
        </div>
        <div class="form-group">
            <label for="image">Add your img URL</label>
            <input type="text" class="form-control" id="image" placeholder="image..." name="image" value="{{old('image', $post->image)}}">
          </div>
          <button type="submit" class="btn btn-warning">Modifica</button>
      </form>
</div>

@endsection