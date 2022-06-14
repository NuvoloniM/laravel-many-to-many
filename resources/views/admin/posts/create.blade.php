@extends('layouts.app')

@section('content')
<div class="container">
  {{-- inserisco il valore enctype per poter far comunicare il form allo storage --}}
    <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Add a title</label>
          <input type="text" class="form-control" id="title" placeholder="title..." name="title">
        </div>
        {{-- aggiungo la select per la cateogry --}}
        <div class="form-group">
          <label for="category">Category</label>
          <select name="category_id" id="category">
              <option value="">Nessuna Categoria</option>
              {{-- ciclo tutti gli elementi nella categories che mi sono passato dal controller --}}
              @foreach ($categories as $category )
                  <option
                  @if( old( 'category_id' ) == $category->id ) selected @endif
                  value=" {{ $category->id }} ">{{ $category->label }}</option>
              @endforeach
          </select>
      </div>
        <div class="form-group">
          <label for="content">Write the content of your post</label>
          <textarea class="form-control" id="content" rows="5" placeholder="A cosa stai pensando?" name="content"></textarea>
        </div>
        {{-- <div class="form-group">
            <label for="image">Add your img URL</label>
            <input type="text" class="form-control" id="image" placeholder="image..." name="image">
          </div> --}}
          <div class="form-group">
            <label for="image">Immagine del post</label>
            {{-- type file per poter permette il caricamento della foto  --}}
            <input type="file" class="form-control-file" id="image" placeholder="url dell'immagine" name="image">
        </div>


          
          <hr>
        <h3>Seleziona tags:</h3>

        @foreach ( $tags as $tag )
            <div class="form-check form-check-inline">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="tag-{{ $tag->id }}"
                    value=" {{ $tag->id }} "
                    name="tags[]"
                    @if ( in_array($tag->id, old('tags', []) ) ) checked @endif
                >
                <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->label }}</label>
            </div>
        @endforeach
          <button type="submit" class="btn btn-primary">Crea</button>
      </form>
</div>

@endsection