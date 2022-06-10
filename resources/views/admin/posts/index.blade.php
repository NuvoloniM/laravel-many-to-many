@extends('layouts.app')

@section('content')
    <div class="container">
        @include('includes.message')
        <a href="{{route('admin.posts.create')}}" class="btn btn-primary my-3">Aggiungi un nuovo post</a>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>
                        {{-- attraverso il collegamento post category riesco ad accedere al colore --}}
                        @if( $post->category )
                            <span class="badge badge-pill badge-{{$post->Category->color}}">{{ $post->Category->label}}</span>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <p>
                            {{$post->content}}
                        </p>
                    </td>
                    <td>
                        <img src="{{$post->image}}" alt="{{$post->title}}" style="width: 200px">
                    </td>
                    <td>{{$post->slug}}</td>
                    <td>
                        <a href="{{ route('admin.posts.show', $post->id)}}" class="btn btn-info ">Show Details</a>
                        <a href="{{ route('admin.posts.edit', $post->id)}}" class="btn btn-warning my-3">Edit Post</a>
                        @include('includes.deleteForm')
                    </td>
                    </tr>
                @empty
                    <h2>Nessun Post presente</h2>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

{{-- in layouts app dopo la sezione content c'è la sezione script, nella quale puoi inserire tutti i js che possono servire solo in quella determinata pagina, per non doverli caricare goni volta semrpe in tutte le pagine --}}
@section('scripts')
    <script src="{{ asset('js/deleteMessage.js')}}"></script>
@endsection