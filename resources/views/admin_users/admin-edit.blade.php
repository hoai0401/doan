@extends('admin.index')

@section('header')
    @parent
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css_view/edit.css') }}">
<div class="form-group">
    <h1>Sửa Tài Khoản Admin</h1>
        <form method="post" action="{{ route('admin_users.update', $admin_user) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
            
                <label for="name">Tên:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $admin_user->name) }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $admin_user->email) }}" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $admin_user->phone) }}" required>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" {{ old('is_admin', $admin_user->is_admin) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_admin">Tài khoản Admin</label>
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="email_verified_at" value="{{ now() }}">
                <button type="submit" class="btn btn-primary">Sửa Tài Khoản</button>
            </div>
        </form>
    </div>
@endsection
