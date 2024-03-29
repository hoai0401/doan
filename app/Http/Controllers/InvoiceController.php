<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Slideshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{

    public function index()
    {
        $invoices = Invoice::all(); 
        return view('invoice.index', compact('invoices'));
    }
 
    public function cancel($id)
    {
        $invoice = Invoice::findOrFail($id);

        if ($invoice->canBeCancelled()) {
            // Update status
            $invoice->update([
                'status' => 4,  
            ]);

            return redirect()->route('user.orders.show', $invoice->id)->with('success', 'Đơn hàng đã được hủy thành công.');
        } else {
            return redirect()->route('user.orders.show', $invoice->id)->with('error', 'Không thể hủy đơn hàng.');
        }
    }
    public function markTransporting($id)
    {
        $invoice = Invoice::findOrFail($id);

        if ($invoice->canBeMarkedTransporting()) {
            // Update status
            $invoice->update([
                'status' => 'Transporting',
            ]);

            return redirect()->route('user.orders.show', $invoice->id)->with('success', 'Đơn hàng đang được vận chuyển.');
        } else {
            return redirect()->route('user.orders.show', $invoice->id)->with('error', 'Không thể cập nhật trạng thái vận chuyển.');
        }
    }

    public function markPaid($id)
    {
        $invoice = Invoice::findOrFail($id);

        if ($invoice->canBeMarkedPaid()) {
            // Update status
            $invoice->update([
                'status' => 'Paid',
            ]);

            return redirect()->route('user.orders.show', $invoice->id)->with('success', 'Đơn hàng đã được thanh toán.');
        } else {
            return redirect()->route('user.orders.show', $invoice->id)->with('error', 'Không thể cập nhật trạng thái thanh toán.');
        }
    }
}
