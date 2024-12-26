<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    @vite(['resources/css/forgotpass.css', 'resources/js/app.js'])
</head>
<body>
    <div>
        <h2>Forgot Password</h2>
        <form action="{{ route('password.email') }}" method="post">
            @csrf
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <button type="submit">Send Reset Link</button>
        </form>

        @if(session('status'))
            <p class="status">{{ session('status') }}</p>
        @endif

        @if($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif
    </div>
</body>
</html>
