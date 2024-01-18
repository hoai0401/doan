@extends('Layouts_User.app')

@section('content')
<h5>Invoice Status</h5>
<p>User: {{$invoice->user_id}}</p>
<p>Invoice Date:{{$invoice->issued_date}}</p>
<p>Address:{{$invoice->shipping_address}}</p>
<p>Phone:{{$invoice->shipping_phone}}</p>
<p>Status:{{$invoice->status}}</p>

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