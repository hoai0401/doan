@extends('Layouts_User.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/favorite.css' )}}">
    <div class="container">
        <h2>Danh sách sản phẩm</h2>

        @if(count($products) > 0)
            <ul>
                @foreach($products as $product)
                    <li>
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->price }}</p>
                        <img src="storage/{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 100px; max-height: 100px;">
                        <!-- Form thêm vào giỏ hàng -->
                        <form action="{{ route('cartadd', ['productid' => $product->id, 'sizeid' => $sizes->first()->id, 'colorid' => $colors->first()->id]) }}" method="get" class="add-to-cart-form">
                            @csrf
                            <button type="submit" name="action" value="buynow" class="add-to-cart-button">Thêm giỏ hàng</button>
                        </form>

                        <!-- Form xóa sản phẩm khỏi danh sách yêu thích -->
                        <form method="post" action="{{ route('favor.destroy', $product->id) }}" class="remove-from-favorites-form" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="remove-from-favorites-button">Xóa</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No favorite products yet.</p>
        @endif
    </div>
@endsection