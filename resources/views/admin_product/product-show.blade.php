@extends('layout.app')

@section('title', 'Product details')

@section('header')
     @parent
     &gt; <a href="{{ route('products.index') }}">Products</a>
     &gt; {{ $p->name }}
@endsection

@section('content')
    <div class="product-details-container">
        <div class="product-image">
            <img style="width: 800px; max-height: 500px; object-fit: contain;" src="{{ $p->image }}">
        </div>
        <div class="product-info">
            <h1>{{ $p->name }}</h1>
            
            @can('isAdmin')
                <a href="{{ route('products.edit', ['product' => $p]) }}">Edit</a>

                <form method="post" action="{{ route('products.destroy', ['product' => $p]) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete">
                </form>
            @endcan

            <p>Loại: {{ $p->category->name }}</p>
            <p>Giá: {{ number_format($p->price, 0, '.', '.') }} VNĐ</p>
            <div>
                <h3>Mô tả</h3>
                {{ $p->desc }}
            </div>
        </div>
    </div>

    @can('isAdmin')
        <!-- <a class="nav-link me-lg-3" href="{{ route('products.create') }}">Create Product</a> -->
    @endcan

    <style>
        .product-details-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .product-image {
            flex: 1;
            margin-right: 20px;
        }

        .product-info {
            flex: 2;
        }
    </style>
@endsection