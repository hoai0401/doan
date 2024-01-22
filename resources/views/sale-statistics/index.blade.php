@extends('admin.index')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="container">
        <h1>Thống kê bán hàng</h1>

        <table class="table">
        <thead>
            <tr>
                <th>Tên Sản phẩm</th>
                <th>Tổng Số lượng bán</th>
                <th>Ngày</th>
            </tr>
        </thead>
        <tbody>
            @foreach($statistics as $stat)
                <tr>
                    <td>{{ $stat->name }}</td>
                    <td>{{ $stat->total_quantity }}</td>
                    <td>{{ $stat->year }}-{{ $stat->month }}-{{ $stat->day }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

        <div class="row">
        
            <div class="col-md-6 custom-chart-container">
            <h2>Biểu đồ Cột</h2>
                <canvas id="barChart" width="400" height="200" data-labels="{{ json_encode($statistics->pluck('name')->toArray()) }}" data-data="{{ json_encode($statistics->pluck('total_quantity')->toArray()) }}"></canvas>
            </div>
            
    </div>
    <script src="{{ asset('js/chart.js') }}"></script>
@endsection
