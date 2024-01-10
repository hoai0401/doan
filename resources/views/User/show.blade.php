@extends('Layouts_User.app')

@section('content')
<div id="myTable" class="khung-chua-san-pham">
    <div class="section">
        <h2>{{ $category->name }}</h2>

        @if(count($products) > 0)
            <div class="product-list">
                @foreach($products as $product)
                    <div class="product-box">
                        <!-- Display product details as needed -->
                        <a class="box" href="{{ route('products.show', ['product' => $product])}}">
                            <div class="hinh-sp">
                                <img src="{{ $product->image }}" class="hinh" alt="{{ $product->name }}">
                            </div>
                            <p class="ten-sp">{{ $product->name }}</p>
                            <p class="gia-tien">{{ number_format($product->price) }} <span style="font-size: 14px">đ</span></p>

                            <div class="them-vao-gio-hang">
                                @auth
                                    <a class="them" href="{{ route('cart.add', ['id' => $product->id]) }}">Add <img class="icon-cart" src="{{ asset('img/icon-cart.png') }}"></a>
                                @else
                                    <a class="them" href="#" onclick="redirectToLogin()">Add <img class="icon-cart" src="{{ asset('img/icon-cart.png') }}"></a>
                                @endauth
                            </div>

                            <script>
                                function redirectToLogin() {
                                    window.location.href = "{{ route('login') }}";
                                }
                            </script>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p>Không có sản phẩm trong danh mục này.</p>
        @endif
    </div>
</div>

@endsection
