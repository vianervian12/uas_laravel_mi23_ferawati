<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="app-container">
        <nav class="navbar">
            <div class="logo">
                <a href="{{ url('/') }}">UAS Laravel</a>
            </div>
            <div class="nav-links">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ route('about') }}">About</a>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-register">Register</a>
                @else
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline-form">
                        @csrf
                        <button type="submit" class="btn btn-logout">Logout</button>
                    </form>
                @endguest
            </div>
        </nav>

        <main class="main-content">
            @yield('content')
        </main>

        <footer class="footer">
            <p>&copy; {{ date('Y') }} UAS Laravel MI23. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
