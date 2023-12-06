@extends('admin.index')

@section('title', 'Product list')

@section('content')
@section('header')
    @parent
    <!-- &gt; <a href="{{ route('products.index') }}">Product</a>
    sửa -->
@endsection
    <h1>Danh mục các sản phẩm</h1>
    <link rel="stylesheet" href="{{ asset('css_view/css.css') }}">
    <table class="table">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Số lượng tồn kho</th>
                <th>Loại sản phẩm</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($lst as $p)
                <tr>
                    <td><img src="{{ $p->image }}" alt="{{ $p->name }}" style="max-width: 100px; max-height: 100px; object-fit: contain;"></td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->description }}</td>
                    <td>{{ number_format($p->price, 0, '.', '.') }} VNĐ</td>
                    <td>{{ $p->stock_quantity }}</td>
                    <td>{{ $p->category_id }}</td>
                    <td>
                        <a href="{{ route('products.edit', ['product' => $p]) }}" class="btn btn-warning">Edit</a>
                        <form method="post" action="{{ route('products.destroy', ['product' => $p]) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
