<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Slideshow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    
    public function addcart($productId, $size, $color)
    {
        $quantity = 1;
        if (Auth::check()) {
            $userId = Auth::user()->id;
    
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
                DB::table('carts')->insert([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            // dd($productId, $size, $color);
            return redirect('/');
        } else {
            return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }
    }
    
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;

            $carts = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->select(
                    'products.name',
                    'products.price',
                    'carts.quantity',
                    'products.id',
                    DB::raw('(SELECT image_url FROM images WHERE images.product_id = products.id LIMIT 1) AS image_url')
                )
                ->where('carts.user_id', $userId)
                ->get();
                // dd($carts);
                if ($carts->isEmpty()) {
                    return view('Cart.cart-index', ['carts' => null, 'title'=>'cart',
                    'slideshows' => Slideshow::where('deleted_at', NULL)->get()
                ]); // Trả về view với biến cart rỗng
                }
                $slideshows = Slideshow::where('deleted_at', NULL)->get();
                return view('Cart.cart-index', compact('carts','slideshows'), ['title'=>'cart']);
        }
        else{
            // Nếu chưa đăng nhập, chưa có ID người dùng, trả về trang đăng nhập
            return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để xem giỏ hàng.');
        }
    }
    public function checkoutshow()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;

            $cartProducts = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->select(
                    'products.name',
                    'products.price',
                    'carts.quantity',
                    'products.id',
                    DB::raw('(SELECT image_url FROM images WHERE images.product_id = products.id LIMIT 1) AS image_url')
                )
                ->where('carts.user_id', $userId)
                ->get();

            $userData = DB::table('users')
                ->select('id','name', 'email','phone','Address')
                ->where('id', $userId)
                ->get();
                session(['productsData' => $cartProducts]);
                session(['user' => $userData]);

                $slideshows = Slideshow::where('deleted_at', NULL)->get();
                return view('cart.checkout', compact('userData', 'cartProducts', 'slideshows'));
        }
        else{
            // Nếu chưa đăng nhập, chưa có ID người dùng, trả về trang đăng nhập
            return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để xem giỏ hàng.');
        }
    }
    public function updateCart(Request $request)
    {
        try {
            $productId = $request->input('productId');
            $action = $request->input('action');
    
            // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng hay không
            $cartItem = Cart::where('product_id', $productId)->first();
    
            if (!$cartItem) {
                return response()->json(['error' => 'Product not found in cart'], 404);
            }
    
            // Cập nhật số lượng dựa vào action
            if ($action === 'increase') {
                $cartItem->quantity++;
            } elseif ($action === 'decrease' && $cartItem->quantity > 1) {
                $cartItem->quantity--;
            }
    
            // Lưu thay đổi
            $cartItem->save();
    
            // Trả về dữ liệu cập nhật, ví dụ: số lượng mới
            $newQuantity = $cartItem->quantity;
    
            return response()->json(['quantity' => $newQuantity]);
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return response()->json(['error' => 'Error updating cart quantity', 'message' => $e->getMessage()], 500);
        }
    }    
}
