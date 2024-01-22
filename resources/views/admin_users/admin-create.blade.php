@extends('admin.index')

@section('content')
   
    <link rel="stylesheet" href="{{ asset('css_view/create.css') }}">
    <div class="form-group">
    <h1>Thêm Tài Khoản Admin</h1>
        <form method="post" action="{{ route('admin_users.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" class="form-control" id="name" name="name" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" {{ old('is_admin') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_admin">Tài khoản Admin</label>
            </div>
        
            <input type="hidden" name="email_verified_at" value="{{ now() }}">
            
            <button type="submit" class="btn btn-primary">Thêm Tài Khoản</button>
        </form>
    </div>
@endsection
