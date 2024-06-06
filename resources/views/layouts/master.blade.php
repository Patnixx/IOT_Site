<!DOCTYPE html>
<html>
    <head>
        @yield('title')
        @vite(['resources/css/app.css'])
        @vite(['resources/js/app.js'])
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        @yield('content')
        @extends('partials.footer')
    </body>   
</html>
