<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .remember {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember input {
            margin-right: 190px;
            margin-bottom: 3px;
        }
    </style>
</head>
<body>
    <form method="post" action="{{ route('login') }}">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" required>
        @if($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
        @endif

        <label>Password:</label>
        <input type="password" name="password" required>
        @if($errors->has('password'))
            <div class="error">{{ $errors->first('password') }}</div>
        @endif

        <div class="remember">
            Remember<input type="checkbox" name="remember">56+
        </div>

        <input type="submit" value="Login">
    </form>

    <script>
        // You can add JavaScript here if needed
    </script>
</body>
</html>
