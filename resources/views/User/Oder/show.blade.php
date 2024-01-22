@extends('Layouts_User.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/invoicedetail.css') }}">
    <h1>Chi Tiết Đơn Hàng</h1>
    <div class="order-details">
        <p><strong>Ngày lập:</strong> {{ $invoice->issued_date }}</p>
        <p><strong>Địa Chỉ:</strong> {{ $invoice->shipping_address }}</p>
        <p><strong>SĐT:</strong> {{ $invoice->shipping_phone }}</p>
        <p><strong>Trạng Thái:</strong> {{ $invoice->status }}</p>
    </div>
    <h2>Danh Sách Đơn Hàng</h2>
    <table class="order-items">
        <thead>
            <tr>
                <th>Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá Bán</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->details as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $detail->unit_price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('user.orders.index') }}" class="back-to-orders">Back to Orders</a>
@endsection