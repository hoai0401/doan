<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Slideshow;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function showstatus()
    {
        $invoice=Invoice::latest()->first();
        if($invoice)
        {
            $slideshows = Slideshow::where('deleted_at', NULL)->get();
            return view('invoice.show',compact('invoice','slideshows'));
        }
        else
        {
            return redirect('/');
        }
    }
    // public function canceled(Request $request)
    // {
    //     $invoices=$request->input('invoicecode');
    //     $invoice = Invoice::where('id', $invoices)->where('status', 'Pending')->first();
    //     if($invoice)
    //     {
    //         $invoice->status=4;
    //         $invoice->save();
    //         $slideshows = Slideshow::where('deleted_at', NULL)->get();
    //         return view('invoice.show',compact('invoice','slideshows'));
    //     }
    //     else
    //     {
    //         return redirect('/');
    //     }
    // }
    public function cancel($id)
    {
        $invoice = Invoice::findOrFail($id);

        if ($invoice->canBeCancelled()) {
            // Update status
            $invoice->update([
                'status' => 4,  
            ]);

            return redirect()->route('show.invoice', $invoice->id)->with('success', 'Đơn hàng đã được hủy thành công.');
        } else {
            return redirect()->route('show.invoice', $invoice->id)->with('error', 'Không thể hủy đơn hàng.');
        }
    }
}
