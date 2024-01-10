<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
//
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
        foreach($lst as $p)
        {
            $this -> fixImage($p);
        }
        return view('layouts.home',['lst'=>$lst]);
    }
}

