<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class UserOderController extends Controller
{
    public function index($status = 'all')
    {
        $user_id = auth()->id();
        $invoices = [];

        if ($status == 'all') {
            $invoices = Invoice::with('details.product')
                ->where('user_id', $user_id)
                ->get();
        } else {
            $invoices = Invoice::with('details.product')
                ->where('user_id', $user_id)
                ->where('status', ucfirst($status))
                ->get();
        }

        return view('user.oder.index', compact('invoices'));
    }
    public function show($id)
    {
        $user_id = auth()->id();
        $invoice = Invoice::with('details.product')
            ->where('user_id', $user_id)
            ->findOrFail($id);
        return view('user.oder.show', compact('invoice'));
    }
}
