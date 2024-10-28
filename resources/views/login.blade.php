<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">

@if(session('success'))
<div id="success-message" class="alert-success">
    {{ session('success') }}
</div>
@endif

        <h2>Login</h2>
        <form action="{{ route('login.user') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <p class="login-link">Don't have an account? <a href="{{ route('user.register') }}">Register here</a>.</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(function () {
                    successMessage.classList.add('fade-out');
                    setTimeout(function () {
                        successMessage.remove();
                    }, 1000);
                }, 3000); 
            }
        });
    </script>
</body>
</html>
