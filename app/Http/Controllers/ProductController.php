<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected function fixImage(Product $p)
    {
        if($p->image && Storage::disk('public')->exists($p->image)){
            $p->image = Storage::url($p->image);
        }
        else
        {
            $p->image='/image/no_image_placeholder.png';
        }
    }

    public function show(Product $product)
    {

        $this->fixImage($product);
        return view('products/product-show',  ['product'=>$product]);
    }

    public function index()
    {

        $lst = Product::orderBy('id', 'desc')->get();
        foreach($lst as $p){
            $this->fixImage($p);
        }
        return view('admin_product.product-index',['lst'=>$lst]);
    }

    public function create()
    {
        $lst=Category::all();
        return view('admin_product.product-create',['lst'=>$lst]);
    }

    public function store(StoreProductRequest $request)
    {
        $p = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'category_id' => $request->category,
            'image' => '',
        ]);

        if ($request->hasFile('image')) {
            try {
                $image = Image::create([
                    'image_url' => '',
                    'product_id' => $p->id,
                ]);

                $path = $request->image->store('upload/product/' . $p->id, 'public');

                // Lưu đường dẫn ảnh vào cả trường image của products và image_url của images
                $image->update(['image_url' => $path]);
                $p->update(['image' => $path]);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Đã xảy ra lỗi khi xử lý ảnh.');
            }
        }

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được tạo thành công.');
    }


    public function edit(Product $product)
    {
        $this->fixImage($product);
        $lst = Category::all();
        return view('admin_product.product-edit', ['p' => $product, 'lst' => $lst]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
       $product->fill([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'category_id' => $request->category,
            'image' => '',
        ]);
       if ($request->hasFile('image')) {
        try {
            $image = Image::create([
                'image_url' => '',
                'product_id' => $product->id,
            ]);

            $path = $request->image->store('upload/product/' . $product->id, 'public');

            // Lưu đường dẫn ảnh vào cả trường image của products và image_url của images
            $image->update(['image_url' => $path]);
            $product->update(['image' => $path]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi xử lý ảnh.');
        }
    }
       return redirect()->route('products.store',['product'=>$product]);
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
