<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\UsersController;

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
Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/register', [RegisterController::class, 'index']);
Route::get('/feed', [FeedController::class, 'index']);

Route::get('classes/index', [ClassController::class, 'index'])->name('classIndex');
Route::get('classes/create', [ClassController::class, 'create'])->name('classCreate');
Route::post('classes/store', [ClassController::class, 'store']);
Route::get('classes/edit/{id}', [ClassController::class, 'edit'])->name('classEdit');
Route::post('classes/update/{id}', [ClassController::class, 'update']);
Route::post('classes/delete/{id}', [ClassController::class, 'delete']);

Route::get('users/index', [UsersController::class, 'index'])->name('usersIndex');
Route::get('users/create', [UsersController::class, 'create'])->name('usersCreate');
Route::post('users/store', [UsersController::class, 'store']);
Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('usersEdit');
Route::post('users/update/{id}', [UsersController::class, 'update']);
Route::post('users/delete/{id}', [UsersController::class, 'delete']);
