<?php

namespace App\Http\Controllers;

use App\Models\Slideshow;
use Illuminate\Http\Request;

class SlideshowController extends Controller
{
    

    public function index()
    {
        $slideshows = Slideshow::all();
        return view('slideshows.index', compact('slideshows'));
    }

    public function create()
    {
        return view('slideshows.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Slideshow::create([
            'image' => 'images/'.$imageName,
        ]);

        return redirect()->route('slideshows.index');
    }
}
