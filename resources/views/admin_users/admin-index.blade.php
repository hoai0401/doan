@extends('admin.index')

@section('content')
    <h1>Danh Sách Tài Khoản Admin</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Admin</th>
                <th>Trạng Thái Email</th>
                <th>Chức Năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admin_users as $admin_user)
                <tr>
                    <td>{{ $admin_user->id }}</td>
                    <td>{{ $admin_user->name }}</td>
                    <td>{{ $admin_user->email }}</td>
                    <td>{{ $admin_user->phone }}</td>
                    <td>{{ $admin_user->is_admin}}</td>
                    <td>{{ $admin_user->email_verified_at ? 'Đã xác thực' : 'Chưa xác thực' }}</td>
                    <td>
                        <a href="{{ route('admin_users.edit', $admin_user) }}" class="btn btn-warning">Sửa</a>
                        <form method="post" action="{{ route('admin_users.destroy', $admin_user) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
