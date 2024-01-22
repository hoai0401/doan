@extends('admin.index')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/promotion.css') }}">
    <h2>Danh sách Khuyến mãi</h2>

    <table class="promotions-table">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Phần trăm Giảm giá</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promotions as $promotion)
                <tr>
                    <td>{{ $promotion->name }}</td>
                    <td>{{ $promotion->discount_percentage }}</td>
                    <td>{{ $promotion->start_date ?: 'Không có' }}</td>
                    <td>{{ $promotion->end_date ?: 'Không có' }}</td>
                    <td>
                        @if($promotion->deleted_at)
                            Hết hạn
                        @else
                            Đang hoạt động
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('promotions.create') }}" class="create-promotion-link">Tạo mới khuyến mãi</a>
    
@endsection
