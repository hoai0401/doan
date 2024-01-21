@extends('Layouts_User.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/invoice.css') }}">
    <h1>My Orders</h1>

    <ul>
        <li><a href="{{ route('user.orders.index', 'all') }}">All Orders</a></li>
        <li><a href="{{ route('user.orders.index', 'pending') }}">Pending Orders</a></li>
        <li><a href="{{ route('user.orders.index', 'transporting') }}">Orders in Transport</a></li>
        <li><a href="{{ route('user.orders.index', 'paid') }}">Paid Orders</a></li>
        <li><a href="{{ route('user.orders.index', 'canceled') }}">Canceled Orders</a></li>
    </ul>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Issued Date</th>
                <th>Status</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->issued_date }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td><a href="{{ route('user.orders.show', $invoice->id) }}">View Details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection