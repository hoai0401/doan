<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm - Shop Quần Áo</title>
    <!-- Thêm các đường dẫn đến các file CSS hoặc thư viện khác nếu cần -->
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>

<body>

    <header>
        <!-- Thêm header nếu có -->

        <!-- Thêm các menu hoặc nút điều hướng khác nếu cần -->
    </header>

    <main>
        <h2>Kết quả tìm kiếm cho "{{ $searchTerm }}"</h2>

        @if(count($products) > 0)
            <div class="product-list">
                @foreach($products as $product)
                    <div class="product-item">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}">
                        <h3>{{ $product->name }}</h3>
                        <p class="price">{{ number_format($product->price) }} <span>đ</span></p>
                        <!-- Thêm các thông tin khác về sản phẩm nếu cần -->
                        <a href="{{ route('products.show', ['product' => $product->id]) }}">Xem chi tiết</a>
                    </div>
                @endforeach
            </div>
        @else
            <p>Không có kết quả tìm kiếm.</p>
        @endif
    </main>

    <footer>
        <!-- Thêm footer nếu có -->
        <div class="footer-content">
            <!-- Thêm thông tin liên hệ hoặc các liên kết khác nếu cần -->
        </div>
    </footer>

    <!-- Thêm các đường dẫn đến các file JavaScript hoặc thư viện khác nếu cần -->

</body>

</html>
