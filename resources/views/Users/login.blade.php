<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="post" action="{{route('login')}}">
        @csrf
        <label >Email:</label> <input name="email"><br>
        @if($errors->has('email')){{$errors->first('email')}}<br>@endif
        <label>Password:</label><input name="password"><br>
        @if ($errors->has('email')){{$errors->first('email')}}<br>@endif
        <label>Remember<input type="checkbox" name="remember"></label>
        <input type="submit">
    </form>
</body>
</html>
