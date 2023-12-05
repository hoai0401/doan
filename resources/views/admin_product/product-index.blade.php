@extends('admin.index')

@section('title', 'Product list')

@section('header')
    @parent
    &gt; <a href="{{ route('products.index') }}">Product</a>
@endsection

@section('content')
<h1>Danh sách các sản phẩm </h1>
    <div class="product-grid">
        <div class="product-container">
            @foreach ($lst as $p)
                <div class="product">
                    <img src="{{ $p->image }}" alt="{{ $p->name }}">
                    <a href="{{ route('products.show', ['product' => $p]) }}">
                        <h3>{{ $p->name }}</h3>
                        <p>Giá: {{ number_format($p->price, 0, '.', '.') }} VNĐ</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px; /* Điều chỉnh khoảng cách giữa các sản phẩm  */
        }

        .product {
            width: calc(33.33% - 20px); /* Điều chỉnh độ rộng của từng sản phẩm (33,33% cho 3 cột) */
            padding: 20px;
            text-align: center;
            background-color: #f9f9f9; /* Tùy chọn: Thêm màu nền để tách biệt tốt hơnn */
        }

        .product img {
            max-width: 100%; /*Đảm bảo hình ảnh không vượt quá chiều rộng vùng chứa */
            max-height: 100%; /* Đảm bảo hình ảnh không vượt quá chiều cao vùng chứa */
            object-fit: contain;
        }

        .product h3 {
            margin-top: 10px;
        }
    </style>
@endsection
