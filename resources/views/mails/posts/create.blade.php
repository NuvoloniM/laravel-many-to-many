<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reply Mail</title>
</head>
<body>
    <h2>Ciao hai creato correttamente un post: {{$post->title}}</h2>
    {{-- tramite le tabelle collegate riesco ad arrivare alle category label e al post image --}}
    <p>Categoria: {{ $post->category->label }}</p>
    <img src="{{ asset("storage/$post->image") }}" alt="">

{{-- //Tags --}}
    <ul>
       @forelse ( $post->tags  as $tag )
        <li>{{ $tag->label }}</li>
        @empty

        @endforelse
    </ul>
</body>
</html>