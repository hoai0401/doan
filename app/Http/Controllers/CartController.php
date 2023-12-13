<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addcart($productId, $quantity)
    {
        // Kiểm tra người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            $userId = Auth::user()->id;
            //dd($userId,$productId,$quantity);
    
            // Kiểm tra sản phẩm đã có trong giỏ hàng của người dùng chưa
            $existingCartItem = Cart::where('user_id', $userId)
                                    ->where('product_id', $productId)
                                    ->first();
    
            if ($existingCartItem) {
                // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
                $existingCartItem->quantity += $quantity;
                $existingCartItem->save();
            } else {
                // Nếu sản phẩm chưa có trong giỏ hàng, tạo một mục mới
                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => $quantity
                ]);
            }
            return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng.');
        } else {
            return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }
    }
    public function index()
    {
        $carts = Cart::all();

        return view('Cart.cart-index', compact('carts'));
    }
}
