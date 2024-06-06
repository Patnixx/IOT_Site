<!DOCTYPE html>
<html>
    <head>
        @yield('title')
        @vite(['resources/css/app.css'])
        @vite(['resources/js/app.js'])
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div class="auth-container">
            <div class="logo">
                @yield('logo')
            </div>
            <div class="login-form">
                @yield('content')
            </div>
        </div>
    </body>   
</html>
