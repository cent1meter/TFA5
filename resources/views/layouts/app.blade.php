<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A basic point-of-sale application built with Laravel.">
    <title>{{ $title }} | SwiftPOS</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a class="brand" href="{{ route('home') }}" aria-label="SwiftPOS home">
                <span class="brand-mark">S</span>
                <span>SwiftPOS</span>
            </a>

            <nav aria-label="Main navigation">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('customers') }}">Customers</a>
                <a href="{{ route('users') }}">Users</a>
            </nav>
        </div>
    </header>

    <main>


@yield('content')
    </main>

    <footer class="site-footer">
        <div class="container footer-wrap">
            <p>&copy; {{ date('Y') }} SwiftPOS</p>
            <p>IT0049 Web System Technologies</p>
        </div>
    </footer>
</body>
</html>
