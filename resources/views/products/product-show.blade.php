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
    <p>{{ $product->description }}</p>
    <p>Price: {{ number_format($product->price) }}đ</p>
    <!-- Add to cart form -->
    <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="post">
        @csrf
        <button type="submit">Add to Cart</button>
    </form>
</div>

</body>
</html>
