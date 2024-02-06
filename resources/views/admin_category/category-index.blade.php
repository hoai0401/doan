@extends('admin.index')

@section('title', 'Danh sách loại sản phẩm')

@section('content')
    @section('header')
        @parent
    @endsection

    <h1>Danh mục các loại sản phẩm</h1>
    <link rel="stylesheet" href="{{ asset('css_view/css.css') }}">
    
    <table class="table">
        <thead>
            <tr>
                <th>Tên loại sản phẩm</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', ['category' => $category]) }}" class="btn btn-warning">Sửa</a>
                        <form method="post" action="{{ route('categories.destroy', ['category' => $category]) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
