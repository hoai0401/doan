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
use DB;

class OrderController extends Controller
{
    public function CreateIncvoice(Request $request){
        // dd($request);
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $productData = session('productsData');
            $userData = session('user');
            // dd($userData);
    
            // Tính tổng giá tiền
            $totalAmount = 0;
            foreach ($productData as $product) {
                // dd($product);
                $totalAmount += $product->price * $product->quantity;
            }
            // dd($productData);
            // Thêm vào bảng invoices

            $invoice=Invoice::create([
                $request->except('_token'),
                'user_id' => $userId,
                'issued_date' => Carbon::now(),
                'shipping_address'=>$userData[0]->Address,
                'shipping_phone' => $userData[0]->phone,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => null,
            ]);
            // try{
            //     Invoice::create([
            //         $request->except('_token'),
            //         'user_id' => $userId,
            //         'issued_date' => Carbon::now(),
            //         'shipping_address'=>(string)$request->input('shipping_address'),
            //         'shipping_phone' => $userData[0]->phone,
            //         'status' => 1,
            //         'created_at' => now(),
            //         'updated_at' => null,
            //     ]);
            // }catch(\Exception $e)
            // {
            //     return redirect()->back()->withInput();
            // }
    
            // Thêm vào bảng invoice_details
            foreach ($productData as $product) {
                // dd($invoice->id);
                InvoiceDetail::create([
                    'quantity' => $product->quantity,
                    'unit_price' => $product->price,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'invoice_id' => $invoice->id,
                    'product_id' => $product->id,
                    'combo_id' => null,
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