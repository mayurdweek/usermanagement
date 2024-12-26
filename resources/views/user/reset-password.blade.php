<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    @vite(['resources/css/resetpass.css', 'resources/js/app.js'])
</head>
<body>
    <div>
        <h2>Reset Password</h2>
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ request()->email }}">
            
            <label for="password">New Password:</label>
            <input type="password" name="password" required>
            
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" required>
            
            <button type="submit">Reset Password</button>
        </form>

        @if($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif
    </div>
</body>
</html>
