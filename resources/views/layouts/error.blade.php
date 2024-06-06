<!DOCTYPE html>
<html>
    <head>
        <title>IOT_Site</title>
        @vite(['resources/css/app.css'])
        @vite(['resources/js/app.js'])
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div class="error-container">
            <div class="logo">
                @yield('logo')
            </div>
            <div class="error-form">
                @yield('content')
            </div>
        </div>
    </body>   
</html>
