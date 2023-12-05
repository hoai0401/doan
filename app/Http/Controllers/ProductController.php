<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        $lst=Category::all();
        return view('admin_product.product-create',['lst'=>$lst]);
    }

    public function store(StoreProductRequest $request)
    {
        $p = Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'stock_quantity'=>$request->stock_quantity,
            'category_id'=>$request->category,
            'price'=>$request->price,
            'image'=>''
        ]);
        // dd($p);
        // Đường dẫn lưu có id sản phẩm để dễ quản lý
        $path = $request->image->store('upload/product/'.$p->id,'public');
        $p->image=$path;
        // dd($p->save());
        $p->save();
        // có thể tạo view cho route  này nếu muốn, hoặc redirect về  trang ds sản phẩm
        return view('admin.index');
        
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
