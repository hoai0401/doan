<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function CreateIncvoice(Request $request){
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $productData = session('productsData');
            $userData = session('user');
            $totalAmount = 0;
            foreach ($productData as $product) {
                $totalAmount += $product->price * $product->quantity;
            }
            $idvoucher=NULL;
            $voucher = session('voucher');            
            if($voucher != NULL){
                $voucherdata = DB::table('promotions')
                ->where('name', $voucher)
                ->first();
                DB::table('promotions')
                    ->where('name', $voucher);

                $totalAmount = $totalAmount - ($totalAmount * $voucherdata->discount_percentage/ 100);
                $idvoucher = $voucherdata->id;
            }
            // dd($idvoucher,$totalAmount);
            $invoice=Invoice::create([
                $request->except('_token'),
                'user_id' => $userId,
                'issued_date' => Carbon::now(),
                'shipping_address'=>$userData[0]->Address,
                'shipping_phone' => $userData[0]->phone,
                'status' => 1,
                'Total'=>$totalAmount,
                'created_at' => now(),
                'updated_at' => null,
            ]);
            // Thêm vào bảng invoice_details
            foreach ($productData as $product) {
                InvoiceDetail::create([
                    'quantity' => $product->quantity,
                    'unit_price' => $product->price,    
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'invoice_id' => $invoice->id,
                    'product_id' => $product->id,
                    'combo_id' => null,      
                    'promotion_id'=>$idvoucher  
                ]);
            }
            session()->forget('productsData');
            Cart::where('user_id', $userId)->delete();
            return redirect('/');
        } else {
            return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để thanh toán.');
        }
    }
}