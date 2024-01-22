@extends('Layouts_User.app')
@section('content')
    <div class="container">
        <h2>Đổi mật khẩu</h2>
        <form method="post" action="{{ route('users.resetpass', $user->id) }}">
            @csrf
            @method('PATCH')

            <!-- Current Password -->
            <div class="form-group">
                <label for="current_password">Mật khẩu hiện tại</label>
                <input type="password" name="current_password" class="form-control" required>
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

            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
    </div>
@endsection