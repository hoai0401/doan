@extends('Layouts_User.app')
{{-- @section('content')
    <div class="container">
        <h2>Đổi mật khẩu</h2>
        <form method="post" action="{{ route('users.resetpass', $user->id) }}">
            @csrf
            @method('PATCH')

            <!-- Current Password -->
            <div class="form-group">
                <label for="password">Mật khẩu hiện tại</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <!-- New Password -->
            <div class="form-group">
                <label for="new_password">Mật khẩu mới</label>
                <input type="password" name="new_password" class="form-control" required>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="confirm_password">Xác nhận mật khẩu mới</label>
                <input type="password" name="confirm_password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Thay đổi mật khẩu</button>
        </form>
    </div>
@endsection --}}
@section('content')
    <h2>Thay đổi mật khẩu</h2>
    <form method="post" action="{{ route('users.update-password', $user->id) }}">
        @csrf
        @method('PATCH')

        <div>
            <label for="current_password">Mật khẩu hiện tại</label>
            <input type="password" name="current_password" required>
            @error('current_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password">Mật khẩu mới</label>
            <input type="password" name="password" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Đổi Mật Khẩu</button>
    </form>
@endsection
