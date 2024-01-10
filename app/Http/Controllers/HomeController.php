<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
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
    public function index()
    {
        $lst = Product::orderBy('id', 'desc')->paginate(25);
        $lst = Product::orderBy('id', 'desc')->paginate(20);

        foreach($lst as $p)
        {
            $this -> fixImage($p);
        }
        return view('layouts.home',['lst'=>$lst]);
    }
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products;

        // Iterate through each product and fix the image
        foreach ($products as $product) {
            $this->fixImage($product);
        }

        return view('User.show', compact('category', 'products'));
    }

}

