@extends('Cart.layouts')

@section('content')
<link rel="stylesheet" href="{{ asset('user_css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/product_show.css') }}">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<div>
    <table class="table">
        <thead>
            <tr>
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
                <td>{{$cart->name}}</td>
                <td>{{ $cart->price }}</td>
                <td>
                    <button class="quantity-btn decrease" data-product-id="{{$cart->id}}">-</button>
                    <span class="quantity" data-product-id="{{$cart->id}}">{{$cart->quantity}}</span>
                    <button class="quantity-btn increase" data-product-id="{{$cart->id}}">+</button>
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
    <div>
        <h3 id="totalAmount">Tổng tiền: {{$totalAmount}}</h3>
    </div>
    <a href="{{route('checkout')}}">
        Check Out
    </a>
    <script src="{{ asset('js/cart.js') }}" defer></script>
</div>
@endsection
<!-- cjk -->