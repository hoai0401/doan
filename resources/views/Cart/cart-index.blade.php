@extends('Cart.layouts')

@section('content')
<link rel="stylesheet" href="{{ asset('user_css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/product_show.css') }}">
    <div>
        <table class="table">
            <thead>
                <tr>  
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Hinh Anh</th>
                </tr>
            </thead>
            <tbody>
            @php
                $totalAmount=0;
            @endphp
            @if ($carts)
                @foreach($carts as $cart)
                    <tr>
                        <td>{{$cart->name}}</td>
                        <td>{{ $cart->price }}</td>    
                        <td>{{ $cart->quantity }}</td>
                        {{-- <td><img src="{{$cart->image_url}}" ></td> --}}
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
            <h3>Tổng tiền: {{$totalAmount}}</h3>
        </div>
        <a href="{{route('checkout')}}">
            Check Out
        </a>
    </div>
@endsection