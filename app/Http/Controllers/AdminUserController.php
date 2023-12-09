<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
   // Trong hàm index của AdminUserController
    public function index()
    {
        $admin_users = User::all(); // hoặc bất kỳ câu truy vấn nào bạn cần
        return view('admin_users.admin-index', ['admin_users' => $admin_users]);
    }


    public function create()
    {
        return view('admin_users.admin-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:255',
        ]);

        $is_admin = $request->has('is_admin') ? 1 : 0;
        $emailVerifiedAt = $request->has('email_verified_at') ? now() : null;

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $is_admin,
            'phone' => $request->phone,
            'email_verified_at' => $emailVerifiedAt,
        ]);

        $user->save();

        return redirect()->route('admin_users.index')->with('success', 'Tài khoản đã được thêm thành công.');
    }

    public function edit(User $admin_user)
    {

        return view('admin_users.admin-edit', ['admin_user' => $admin_user]);
    }

    public function update(Request $request, User $admin_user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin_user->id,
            'password' => 'nullable|string|min:8',
            'phone' => 'required|string|max:255',
        ]);
    
        $is_admin = $request->has('is_admin') ? 1 : 0;
        $emailVerifiedAt = $request->has('email_verified_at') ? now() : null;
    
        $admin_user->name = $request->name;
        $admin_user->email = $request->email;
        $admin_user->is_admin = $is_admin;
        $admin_user->phone = $request->phone;
        $admin_user->email_verified_at = $emailVerifiedAt;
    
        if ($request->filled('password')) {
            $admin_user->password = Hash::make($request->password);
        }
    
        $admin_user->save();
    
        return redirect()->route('admin_users.index')->with('success', 'Tài khoản đã được cập nhật thành công.');
    }


    public function destroy(User $admin_user)
    {
        $admin_user->delete();
        return redirect()->route('admin_users.index')->with('success', 'Tài khoản Admin đã được xóa thành công.');
    }
}
