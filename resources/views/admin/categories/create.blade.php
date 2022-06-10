@extends('layouts.app')

@section('content')
<div class="container">
    <form action=" {{route('admin.categories.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="label">Label</label>
            <input type="text" class="form-control" id="label" name="label">
        </div>

        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" class="form-control" id="color" name="color">
        </div>
        <button type="submit" class="btn btn-success">Crea</button>

    </form>
</div>

@endsection
