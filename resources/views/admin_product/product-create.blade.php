@extends('admin.index')

@section('header')
    @parent
    > <a href="{{ route('products.index') }}">Products</a>
    > Sửa sản phẩm
@endsection

@section('content')
<!-- enctype của form để upload file -->
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
        <label for="desc">Mô tả:</label>
        <textarea id="description" name="description"></textarea>
        @if($errors->has('description')) <span class="error">{{ $errors->first('description') }}</span> @endif
    </div>

    <div class="form-group">
        <label for="image">Hình mới:</label>
        <input type="file" accept="image/*" id="image" name="image"><br>
        @if($errors->has('image')) <span class="error">{{ $errors->first('image') }}</span> @endif
    </div>

    <div class="form-group">
        <label for="stock_quantity">Số lượng tồn kho:</label>
        <input type="text" id="stock_quantity" name="stock_quantity">
        @if($errors->has('stock_quantity')) <span class="error">{{ $errors->first('stock_quantity') }}</span> @endif
    </div>

    <input type="submit" value="Submit">
</form>


<style>
    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
    }

    input[type="text"],
    select,
    textarea {
        width: 99%;
        padding: 5px;
    }

    .error {
        color: red;
    }
</style>
@endsection
