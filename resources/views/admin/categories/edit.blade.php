
@extends('layouts.app')

@section('content')
<div class="container">
    <form action=" {{route('admin.categories.update', $category->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="label">Label</label>
            <input type="text" class="form-control" id="label" name="label" value=" {{ old('label', $category->label) }} ">
        </div>

        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" class="form-control" id="color" name="color" value=" {{ old('color', $category->color) }} ">
        </div>
        <button type="submit" class="btn btn-success">Crea</button>

    </form>
</div>

@endsection