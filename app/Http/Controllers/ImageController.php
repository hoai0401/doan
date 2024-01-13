<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = new Image;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('upload/images', 'public');
            $image->image_url = $path;
        }

        $image->save();

        return redirect()->route('dashboard');
    }


}
