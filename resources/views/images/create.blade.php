@extends('admin.index')

@section('header')
    @parent
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="image">Choose Image:</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Add Image</button>
        </form>
    </div>
@endsection