<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/product_show.css') }}">
</head>
<body>

    <div class="product-details">
        <div class="hinh-sp">
            <img src="{{ $product->image }}" class="hinh" alt="{{ $product->name }}">
        </div>
        <h1>{{ $product->name }}</h1>
        <h2 class="Gia"> {{ number_format($product->price) }}đ</h2>
        <h2>Mô tả sản phẩm:</h2>
        <p>{{ $product->description }}</p>


        <div class="color-options">
            <label for="color">Color:</label>
            <select id="color" name="color">
                @foreach($colors as $color)
                <option value="{{ $color->name }}">{{ $color->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="size-options">
            <label for="size">Size:</label>
            <select id="size" name="size">
                @foreach($sizes as $size)
                <option value="{{ $size->name }}">{{ $size->name }}</option>
                @endforeach
            </select>
        </div>


        <!-- Quantity and Add to Cart form -->



        <!-- Add to cart form -->
        <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="post">
            @csrf
            <button type="submit" name="action" value="buynow">Mua ngay</button>
        </form>
    </div>


</body>
</html>
