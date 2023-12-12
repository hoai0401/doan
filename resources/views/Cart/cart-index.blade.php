@extends('Cart.layouts')

@section('content')
<link rel="stylesheet" href="{{ asset('user_css/index.css') }}">
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Ảnh</th>    
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
            @foreach($carts as $cart)
                <tr>
                    <td>{{ $cart->product_id }}</td>    
                    <td>{{ $cart->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
            </tbody>
        </table>
    </div>
@endsection