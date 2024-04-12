<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login.login');
});

Route::get('/feed', function () {
    return view('feed.feed');
});

Route::get('/createclass', function () {
    return view('classes.ceatec');
});

Route::get('/editclass', function () {
    return view('classes.editc');
});

Route::get('/class', function () {
    return view('classes.indexc');
});

Route::get('/createuser', function () {
    return view('users.ceateu');
});

Route::get('/edituser', function () {
    return view('users.editu');
});

Route::get('/user', function () {
    return view('users.indexu');
});
