{{-- separo il form del delete per poterlo utilizzare in più pagine --}}
<form action="{{route('admin.categories.destroy', $category->id)}}" method="POST" class="delete-form">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger">Delete</button>
</form>