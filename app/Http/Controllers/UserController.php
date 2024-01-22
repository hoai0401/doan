<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('user.index-user', ['user'=>$user]);
    }

    public function edit($userId)
    {
        $user = User::find($userId);
        return view('User.edit-user', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }
    // public function passwordchange($userId)
    // {
    //     $user=User::find($userId);
    //     return view('User.change-password',compact('user'));
    // }
    // public function resetpassword(Request $request, User $user)
    // {
    //     $request->validate([
    //         'current_password' => 'required|string|min:8',
    //         'password' => 'required|string|min:8',
    //         'confirm_password' => 'required|string|min:8|same:password',
    //     ]);
    //     if (!Hash::check($request->input('current_password'), $user->password)) {
    //         return redirect()->back()->with('error', 'Current password is incorrect.');
    //     }
    //     $user->update([
    //         'password' => Hash::make($request->input('password')),
    //     ]);
    //     return redirect()->route('users.index');
    // }
    public function passwordchange($userId)
    {
        $user = User::find($userId);
        return view('User.change-password', compact('user'));
    }

    public function resetpassword(Request $request, User $user)
    {
        $request->validate([
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8|same:password',
        ]);

        // Khi không kiểm tra current_password từ server, chỉ kiểm tra sự trùng khớp trong view
        if ($request->input('current_password') !== $request->input('current_password_confirmation')) {
            return redirect()->back()->with('error', 'Mật khẩu hiện tại không chính xác.');
        }

        // Update mật khẩu
        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('users.index');
    }

}

