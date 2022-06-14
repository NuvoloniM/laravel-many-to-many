@extends('layouts.app')



@section('content')
    <div class="container text-center">
      @include('includes.message')
        <div class="card mx-auto" style="width: 18rem;">
          {{-- essendomi passato il percorso, ora lo posso usare per mostrare l'immagine caricata, passando per la cartella in asset(creata col collegamento) --}}
            <img src="{{ asset("storage/$post->image")}}" class="card-img-top" alt="{{$post->title}}">
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <h6 class="card-title">{{$post->id}}</h6>
              <h6 class="card-title">
                @if( $post->category )
                  <span class="badge badge-pill badge-{{$post->Category->color}}">{{ $post->Category->label}}</span>
                @else
                  nessuna categoria è assegnata
                @endif
              </h6>
              <p class="card-text"> {{$post->content}}</p>
              @include('includes.deleteForm')
            </div>
            <h6 class="card-title">tags:</h3>
              {{-- richiamo la funzione nel model che mette in relazione le tabelle con quella ponte per poter accedere ai dati  --}}
            @forelse ( $post->tags as $tag )
                <span class="badge" style=" background-color: {{ $tag->color }} " >{{ $tag->label }}</span>
            @empty
                <h3>Non ci sono tag abbinati</h3>
            @endforelse
          </div>
    </div>
@endsection

{{-- in layouts app dopo la sezione content c'è la sezione script, nella quale puoi inserire tutti i js che possono servire solo in quella determinata pagina, per non doverli caricare goni volta semrpe in tutte le pagine --}}
@section('scripts')
    {{-- lo importo da asseto, ma prima devo aver inserito il file js in webpack e dopo devo aver rilanciato npm run dev --}}
    <script src="{{ asset('js/deleteMessage.js')}}"></script>
@endsection