<!DOCTYPE html>
<html>
    <head>
        <title>IOT_Site</title>
        @vite(['resources/css/app.css'])
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        @yield('content')
        <!--<div class="dot-bar">
            <div class="dot-link"><div class="dot active"></div></div>
            <div class="dot-link"><div class="dot"></div></div>
            <div class="dot-link"><div class="dot"></div></div>
            <div class="dot-link"><div class="dot"></div></div>
        </div>-->
        @extends('partials.footer')
    </body>   
</html>
