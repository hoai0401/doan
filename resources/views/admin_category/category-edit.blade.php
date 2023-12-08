@extends('admin.index')

@section('header')
    @parent
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css_view/create.css') }}">
    <div class="form-group">
        <h1>Sữa Loại Sản Phẩm</h1>
        <form method="post" action="{{ route('categories.update', $category) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Tên loại sản phẩm:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}">
                @if($errors->has('name')) <span class="text-danger">{{ $errors->first('name') }}</span> @endif
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật loại sản phẩm</button>
        </form>
</div>
@endsection
