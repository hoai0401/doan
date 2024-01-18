<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function create()
    {
        return view('images.create',[
            'products'=>Product::where('deleted_at', NULL)->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        try{
            $request->except('_token');
            Image::create([
                'image_url' => (string)$request->file('image')->store('upload/images', 'public'),
                'product_id' => (string)$request->input('product_id')
            ]);
        }catch(\Exception $e)
        {
            return redirect()->back();
        }

        return redirect()->route('dashboard');
    }


}
