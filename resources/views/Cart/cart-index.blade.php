@extends('Cart.layouts')

@section('content')
<link rel="stylesheet" href="{{ asset('user_css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/product_show.css') }}">
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<div>
    <table class="table">
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="selectAllBtn"> <!-- Select All Checkbox -->
                </th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Hình ảnh</th>
            </tr>
        </thead>
        <tbody>
            @php
            $totalAmount = 0;
            @endphp
            @if ($carts)
            @foreach($carts as $cart)
            <tr>
                <td>
                <input type="checkbox" class="product-checkbox" data-product-id="{{$cart->id}}" data-price="{{$cart->price}}">

                </td>
                <td>{{$cart->name}}</td>
                <td>{{ $cart->price }}</td>
                <td>
                    <div class="quantity-control">
                        <div>
                            <button class="quantity-btn decrease" data-product-id="{{$cart->id}}">-</button>
                        </div>
                        <div>
                            <span class="quantity" data-product-id="{{$cart->id}}">{{$cart->quantity}}</span>
                        </div>
                        <div>
                            <button class="quantity-btn increase" data-product-id="{{$cart->id}}">+</button>
                        </div>
                    </div>
                </td>
                <td><img src="storage/{{$cart->image_url}}" alt="Image 1" style="max-width: 100px; max-height: 100px;"></td>
            </tr>
            @php
            $totalAmount+=$cart->price*$cart->quantity;
            @endphp
            @endforeach
            @endif
        </tbody>
    </table>
    <div class="cart-summary">
        <div>
            <h3 id="totalAmount">Tổng tiền: {{$totalAmount}}</h3>
        </div>
        <a href="{{route('checkout')}}" class="checkout-btn">
            Check Out
        </a>
    </div>
    
    <script src="{{ asset('js/cart.js') }}" defer></script>
</div>
@endsection