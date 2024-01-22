@extends('Layouts_User.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/invoice.css') }}">
    <h1>My Orders</h1>

    <ul>
        <li><a href="{{ route('user.orders.index', 'all') }}">Tất cả đơn hàng</a></li>
        <li><a href="{{ route('user.orders.index', 'pending') }}">Đang chờ</a></li>
        <li><a href="{{ route('user.orders.index', 'transporting') }}">Đang vận chuyển</a></li>
        <li><a href="{{ route('user.orders.index', 'paid') }}">Đã Giao</a></li>
        <li><a href="{{ route('user.orders.index', 'canceled') }}">Đã hủy</a></li>
    </ul>

    <table>
        <thead>
            <tr>
                <th>Ngày Lập</th>
                <th>Trạng Thái</th>
                <th>Chi Tiết</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->issued_date }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>{{$invoice->Total}}</td>
                    <td><a href="{{ route('user.orders.show', $invoice->id) }}">Xem chi tiết</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection