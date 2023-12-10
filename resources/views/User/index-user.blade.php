@extends('Layouts_User.app')

@section('content')
<link rel="stylesheet" href="{{ asset('user_css/index.css') }}">
 <table>
        <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Chỉnh Sữa Hồ Sơ</th>
            </tr>
        </thead>
        <tbody>
            @if (Auth::check())
                <tr>
                    <td>{{ Auth::user()->name }}</td>
                    <td>{{ Auth::user()->email }}</td>
                    <td>{{ Auth::user()->phone }}</td>
                    <td>
                        <a href="{{ route('users.edit', Auth::user()->id) }}">Chỉnh sửa</a>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
<!-- zlxmaskjdjakjsdnkajsdhk -->
