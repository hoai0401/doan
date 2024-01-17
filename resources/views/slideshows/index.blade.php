@extends('admin.index')

@section('header')
    @parent
@endsection

@section('content')
<h2>Slideshows</h2>
<link rel="stylesheet" href="{{ asset('css/slishow.css') }}">
    <table class="table">

    <thead>
        <tr>
            <th>Image</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($slideshows as $slideshow)
            <tr>
                <td>
                    <img src="{{ asset($slideshow->image) }}" alt="Slideshow Image">
                </td>
                <td>
                <form action="{{ route('slideshows.destroy', $slideshow->id) }}" method="POST">
                    @csrf
                    @method('DELETE')       
                    <button class="btn btn-outline-danger">Xóa</button>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
