@extends('admin.index')

@section('content')
    <h5>Admin Invoice Management</h5>
    <link rel="stylesheet" href="{{ asset('css_view/css.css') }}">

    <table class="table">
        <thead>
            <tr>
                <th>Khách hàng</th>
                <th>Ngày lập hóa đơn</th>
                <th>Địa chỉ</th>
                <th>SĐT</th>
                <th>Thông tin đơn hàng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->user_id }}</td>
                    <td>{{ $invoice->issued_date }}</td>
                    <td>{{ $invoice->shipping_address }}</td>
                    <td>{{ $invoice->shipping_phone }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>
                        @if($invoice->status == 'Pending')
                            <!-- Nếu trạng thái là Pending -->
                            <form action="{{ route('invoices.markTransporting', ['id' => $invoice->id]) }}" method="post">
                                @csrf
                                <button type="submit" >Đánh dấu đang vận chuyển</button>
                            </form>
                        @elseif($invoice->status == 'Transporting')
                            <!-- Nếu trạng thái là Transporting -->
                            <form action="{{ route('admin.invoices.markPaid', ['id' => $invoice->id]) }}" method="post">
                                @csrf
                                <button type="submit">Đánh dấu đã thanh toán</button>
                            </form>
                        @elseif($invoice->status == 'Paid')
                            <!-- Nếu trạng thái là Paid -->
                            <p>Đơn hàng đã được giao</p>
                        @elseif($invoice->status == 'Canceled')
                            <!-- Nếu trạng thái là Canceled -->
                            <p>Đơn hàng đã hủy</p>
                        @endif

                        <!-- Ẩn nút "Đánh dấu đã hủy" khi trạng thái là "Paid" hoặc "Canceled" -->
                        @if($invoice->status != 'Transporting' && $invoice->status != 'Canceled'&& $invoice->status != 'Paid' )
                            <form action="{{ route('invoices.cancel', ['id' => $invoice->id]) }}" method="post">
                                @csrf
                                <button type="submit">Đánh dấu đã hủy</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection