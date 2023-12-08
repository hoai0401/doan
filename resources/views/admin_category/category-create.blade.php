@extends('admin.index')

@section('header')
    @parent
@endsection
    @section('content')
    <link rel="stylesheet" href="{{ asset('css_view/create.css') }}">
        <div class="form-group">
        <h1>Thêm sản phẩm</h1>
            <form method="post" action="{{ route('categories.store') }}">
                @csrf
                <div class="form-group">
                <label for="name">Tên loại sản phẩm:</label>
                <input type="text" name="name" id="name" required>

                <button type="submit">Thêm loại sản phẩm</button>
                </div>
            </form>
        </div>
@endsection

