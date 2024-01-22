@extends('admin.index')

@section('content')
    <h2>Tạo mới Khuyến mãi</h2>

    <!-- Hiển thị lỗi nếu có -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form để tạo mới khuyến mãi -->
    <form method="post" action="{{ route('promotions.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="discount_percentage">Phần trăm Giảm giá:</label>
            <input type="number" class="form-control" id="discount_percentage" name="discount_percentage" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="start_date">Ngày bắt đầu:</label>
            <input type="date" class="form-control" id="start_date" name="start_date">
        </div>
        <div class="form-group">
            <label for="end_date">Ngày kết thúc:</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
        </div>
        <button type="submit" class="btn btn-primary">Tạo mới Khuyến mãi</button>
    </form>

    <a href="{{ route('promotions.index') }}">Quay lại danh sách Khuyến mãi</a>
@endsection
