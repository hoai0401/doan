@extends('Layouts_User.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/invoicedetail.css') }}">
    <h1>Order Details</h1>
    <div class="order-details">
        <p><strong>Issued Date:</strong> {{ $invoice->issued_date }}</p>
        <p><strong>Shipping Address:</strong> {{ $invoice->shipping_address }}</p>
        <p><strong>Shipping Phone:</strong> {{ $invoice->shipping_phone }}</p>
        <p><strong>Status:</strong> {{ $invoice->status }}</p>
    </div>
    <h2>Order Items</h2>
    <table class="order-items">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Unit Price</th>
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