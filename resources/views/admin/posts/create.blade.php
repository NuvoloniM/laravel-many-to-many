@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('admin.posts.store')}}" method="POST">
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
        <div class="form-group">
            <label for="image">Add your img URL</label>
            <input type="text" class="form-control" id="image" placeholder="image..." name="image">
          </div>
          <button type="submit" class="btn btn-primary">Crea</button>
      </form>
</div>

@endsection