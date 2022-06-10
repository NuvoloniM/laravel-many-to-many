{{-- intercetta  mostra messaggi in session, se presenti.  --}}
@if ( session('message'))
    <div class="alert alert-info">
        {{ session('message')}}
    </div>
    
@endif