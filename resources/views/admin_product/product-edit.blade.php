@extends('admin.index')

@section('header')
    @parent
@endsection

@section('content')
    <form method="post" action="{{ route('products.update',$p) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $p->name) }}">
            @if($errors->has('name')) <span class="text-danger">{{ $errors->first('name') }}</span> @endif
        </div>
        <div class="form-group">
            <label for="price">Giá:</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $p->price) }}">
            @if($errors->has('price')) <span class="text-danger">{{ $errors->first('price') }}</span> @endif
        </div>
        <div class="form-group">
            <label for="category">Loại sản phẩm:</label>
            <select class="form-control" id="category" name="category">
                <option value=''>--Chọn loại--</option>
                @foreach ($lst as $cat)
                    <option value="{{ $cat->id }}" @if($cat->id==old('category', $p->category_id)) selected @endif>{{ $cat->name }}</option>
                @endforeach
            </select>
            @if($errors->has('category')) <span class="text-danger">{{ $errors->first('category') }}</span> @endif
        </div>

        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $p->description) }}</textarea>
            @if($errors->has('description')) <span class="text-danger">{{ $errors->first('description') }}</span> @endif
        </div>

        <div class="form-group">
            <label for="image">Hình mới:</label>
            <img style="width: 800px; max-height: 300px; object-fit: contain;" src="{{ $p->image }}"><br>
            <input type="file" accept="image/*" class="form-control-file" id="image" name="image"><br>
            @if($errors->has('image'))<br>
            <span class="text-danger">{{ $errors->first('image') }}</span> @endif
        </div>
        <div class="form-group">
            <label for="stock_quantity">Số lượng tồn kho:</label>
            <input type="text" class="form-control" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', $p->stock_quantity) }}">
            @if($errors->has('stock_quantity')) <span class="text-danger">{{ $errors->first('stock_quantity') }}</span> @endif

        <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
    </form>
    
    <style>
        .form-control {
            width: 99%;
        }
    </style>
@endsection
