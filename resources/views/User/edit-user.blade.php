@extends('Layouts_User.app')

@section('content')
<link rel="stylesheet" href="{{ asset('user_css/edit.css') }}">
    <div class="xMDeox">
    <div class="form-group">
        <h1>Chỉnh Sữa Hồ Sơ</h1>
        <form method="post" action="{{ route('users.update', ['user' => $user->id]) }}">

            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
        <br>
    </div>
</div>
@endsection

