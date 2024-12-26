<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('user.checklogin') }}" method="post" class="loginform">
            @csrf
            
            <div class="login">
                <div class="email">
                    <div class="email-input">
                        <input type="email" name="email" placeholder="Enter Email" class="input-e" required>
                    </div>
                </div>
                <div class="password">
                    <div class="password-input">
                        <input type="password" name="password" placeholder="Enter Password" class="input-p" required>
                    </div>
                </div>
                <div class="submit">
                    <button type="submit" class="btn-submit">Login</button>
                </div>
                <div class="forgetpass1">
                    <a href="{{route('password.request')}}">Forgot password</a>
                </div>
            </div>
        </form>
        @if(session('message'))
            <script>
                alert(@json(session('message')))
            </script>
        @endif
    </div>
</body>
</html>