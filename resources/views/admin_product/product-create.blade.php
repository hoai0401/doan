@extends('admin.index')

@section('header')
    @parent
@endsection

@section('content')
    <h1>Thêm sản phẩm</h1>
    <link rel="stylesheet" href="{{ asset('css_view/create.css') }}">
    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" id="name" name="name">
            @if($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span>@endif
        </div>

        <div class="form-group">
            <label for="price">Giá:</label>
            <input type="text" id="price" name="price">
            @if ($errors->has('price')) <span class="error">{{ $errors->first('price') }}</span> @endif
        </div>

        <div class="form-group">
            <label for="category">Loại sản phẩm:</label>
            <select id="category" name="category">
                <option value=''>--Chọn loại--</option>
                @foreach ($lst as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            @if($errors->has('category')) <span class="error">{{ $errors->first('category') }}</span> @endif
        </div>

        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea id="description" name="description"></textarea>
            @if($errors->has('description')) <span class="error">{{ $errors->first('description') }}</span> @endif
        </div>

        <div class="form-group">
            <label for="image">Hình mới:</label>
            <input type="file" accept="image/*" id="image" name="image" onchange="previewImage(this)">
            @if($errors->has('image')) <span class="error">{{ $errors->first('image') }}</span> @endif
            <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">
        </div>

        <div class="form-group">
            <label for="stock_quantity">Số lượng tồn kho:</label>
            <input type="text" id="stock_quantity" name="stock_quantity">
            @if($errors->has('stock_quantity')) <span class="error">{{ $errors->first('stock_quantity') }}</span> @endif
        </div>
        <input type="submit" value="Submit">
    </form>

    <script>
        function previewImage(input) {
            var preview = document.getElementById('preview');
            preview.style.display = 'block';
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection
