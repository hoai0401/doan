@extends('admin.index')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="container">
        <h1>Sale Statistics</h1>

        <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Total Quantity Sold</th>
                <th>Date</th>
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
            <h2>Bar Chart</h2>
                <canvas id="barChart" width="400" height="200" data-labels="{{ json_encode($statistics->pluck('name')->toArray()) }}" data-data="{{ json_encode($statistics->pluck('total_quantity')->toArray()) }}"></canvas>
            </div>
            <div class="col-md-6 ">
                <h2>Pie Chart</h2>
                <canvas id="pieChart" width="400" height="200" data-labels="{{ json_encode($statistics->pluck('name')->toArray()) }}" data-data="{{ json_encode($statistics->pluck('total_quantity')->toArray()) }}"></canvas>
            </div>

        </div>
    </div>
    <script src="{{ asset('js/chart.js') }}"></script>
@endsection
