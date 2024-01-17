@extends('admin.index')

@section('header')
    @parent
@endsection

@section('content')
    <h2>Create Slideshow</h2>
    <form action="{{ route('slideshows.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create Slideshow</button>
    </form>
@endsection