<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    public function showForm()
    {
        // Lấy danh sách email từ cơ sở dữ liệu
        $existingEmails = DB::table('users')->pluck('email')->toArray();

        return view('signup', ['existingEmails' => $existingEmails]);
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

        try {
            // Create a new user
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            // Redirect to login or wherever you want
            return redirect('/login')->with('success'); // Thêm thông báo thành công

        } catch (\Exception $e) {
            // Handle the exception and redirect back with an error message
            return redirect()->back()->with('error');
        }
    }
}
