@extends('Layouts_User.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/invoice.css') }}">
<h1>My Invoices</h1>

    <table>
        <thead>
            <tr>
                <th>Issued Date</th>
                <th>Status</th>
                <!-- Thêm các cột khác nếu cần -->
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->issued_date }}</td>
                    <td>{{ $invoice->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@if (Auth::user()->is_admin)
    @if ($invoice->status == 'Pending')
        <!-- Nếu trạng thái là Pending -->
        @if ($invoice->canBeCancelled())
            <form action="{{ route('invoices.cancel', ['id' => $invoice->id]) }}" method="post">
                @csrf
                <button type="submit" >Hủy đơn</button>
            </form>
        @endif
    @elseif ($invoice->status == 'Transporting')
        <!-- Nếu trạng thái là Transporting -->
        <p>Đơn hàng đang vận chuyển</p>
    @elseif ($invoice->status == 'Paid')
        <!-- Nếu trạng thái là Paid -->
        <p>Đơn hàng đã thanh toán</p>
    @elseif ($invoice->status == 'Canceled')
        <!-- Nếu trạng thái là Canceled -->
        <p>Đơn hàng đã hủy</p>
    @endif

    <a href="{{ route('admin.invoices.index') }}">Trở về trang admin</a>
@endif
@endsection
