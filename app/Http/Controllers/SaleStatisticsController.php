<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleStatisticsController extends Controller
{
    public function index()
    {
        // Lấy thông tin cần thiết từ bảng invoice_details
        $statistics = DB::table('invoice_details')
            ->join('products', 'invoice_details.product_id', '=', 'products.id')
            ->select(
                'products.name',
                DB::raw('SUM(invoice_details.quantity) as total_quantity'),
                DB::raw('DATE(invoice_details.created_at) as date')
            )
            ->groupBy('products.name', 'date')
            ->get();

        // Trích xuất năm, tháng và ngày từ ngày
        foreach ($statistics as $stat) {
            $date = \Carbon\Carbon::parse($stat->date);
            $stat->year = $date->year;
            $stat->month = $date->month;
            $stat->day = $date->day;
        }

        return view('sale-statistics.index', compact('statistics'));
    }
}
