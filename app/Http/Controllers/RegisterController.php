<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{


    public function showForm()
    {
        return view('signup');
    }
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        // Validation
        $request->validate([    
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin'=>'0',
            'phone'=>$request->phone,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to login or wherever you want
        return redirect('/login');
    }
}
