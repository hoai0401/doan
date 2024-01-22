<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $sizes = Size::where('deleted_at', NULL)->get();
        $colors = Color::where('deleted_at', NULL)->get();
        $user_id = Auth::id();

        // Lấy danh sách sản phẩm yêu thích của người dùng từ database
        $favorites = Favorite::where('user_id', $user_id)->pluck('product_id')->toArray();

        // Thực hiện truy vấn để lấy thông tin của tất cả các sản phẩm trong danh sách yêu thích
        $products = Product::whereIn('id', $favorites)->get();

        return view('favorites.index', compact('products', 'favorites', 'sizes', 'colors'));
    }

    public function toggleFavorite(Request $request, $product_id)
    {
        $user_id = Auth::id();

        // Kiểm tra xem sản phẩm có trong danh sách yêu thích hay không
        $favorite = Favorite::where('user_id', $user_id)->where('product_id', $product_id)->first();

        if ($favorite) {
            // Nếu có, loại bỏ sản phẩm khỏi danh sách
            $favorite->delete();
        } else {
            // Nếu không, thêm sản phẩm vào danh sách
            Favorite::create(['user_id' => $user_id, 'product_id' => $product_id]);
        }

        return redirect()->back();
    }

    public function destroy(Request $request, $product_id)
    {
        $user_id = Auth::id();

        // Kiểm tra xem sản phẩm có trong danh sách yêu thích hay không
        $favorite = Favorite::where('user_id', $user_id)->where('product_id', $product_id)->first();

        if ($favorite) {
            // Nếu có, loại bỏ sản phẩm khỏi danh sách
            $favorite->delete();
        }

        return redirect()->route('index.fa');
    }
}
