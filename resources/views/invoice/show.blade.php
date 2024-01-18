@extends('Cart.layouts')

@section('content')
<h5>Invoice Status</h5>
<p>User: {{$invoice->user_id}}</p>
<p>Invoice Date:{{$invoice->issued_date}}</p>
<p>Address:{{$invoice->shipping_address}}</p>
<p>Phone:{{$invoice->shipping_phone}}</p>
<p>Status:{{$invoice->status}}</p>
{{-- @if ($invoice->status='Pending')
    <form action="{{route('show.canceled')}}" method="post">
        @csrf
        @method('Patch')
        <button>Xóa</button>
    </form>
@endif --}}
@if ($invoice->canBeCancelled())
    <form action="{{ route('invoices.cancel', ['id' => $invoice->id]) }}" method="post">
        @csrf
        <button type="submit" onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng?')">Hủy đơn hàng</button>
    </form>
@endif
{{-- @dd($invoice->status) --}}
@endsection