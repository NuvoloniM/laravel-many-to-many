@extends('layouts.app')

@section('content')
<div class="container">
  {{-- come con il create, anche nell'edit mi devo creare il collegamento con enctype --}}
    <form action="{{route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
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
        {{-- <div class="form-group">
            <label for="image">Add your img URL</label>
            <input type="text" class="form-control" id="image" placeholder="image..." name="image" value="{{old('image', $post->image)}}">
          </div> --}}
          {{-- anche qua modifico il type in file --}}
          <div class="form-group">
            <label for="image">Immagine del post</label>
            <input type="file" class="form-control-file" id="image" placeholder="url dell'immagine" name="image">
        </div>


          @foreach ( $tags as $tag )
          <div class="form-check form-check-inline">
              <input
                  class="form-check-input"
                  type="checkbox"
                  id="tag-{{ $tag->id }}"
                  value=" {{ $tag->id }} "
                  name="tags[]"
                  @if ( in_array($tag->id, old('tags', $post_tags_id ) ) ) checked @endif
              >
              <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->label }}</label>
          </div>
      @endforeach
          <button type="submit" class="btn btn-warning">Modifica</button>
      </form>
</div>

@endsection