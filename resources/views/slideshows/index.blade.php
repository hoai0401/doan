@extends('admin.index')

@section('header')
    @parent
@endsection

@section('content')
    <h2>Slideshows</h2>

    @foreach($slideshows as $slideshow)
        <img src="{{ asset($slideshow->image) }}" alt="Slideshow Image">
    @endforeach

@endsection
