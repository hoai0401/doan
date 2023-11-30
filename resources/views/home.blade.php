@extends('layouts.app')

@auth
@endauth
<a href="\">Home</a>
<br>

@guest
    <a href="{{route('login')}}">Đăng nhập</a>

@endguest
<br>
@auth
    <a class="nav-item">chào {{Auth::user()->username}}</a>
    <form method="post" action="{{route('logout')}}">
        @csrf
        <input type="submit" value="Đăng Xuất" class="nav-link">
    </form>
@endauth
