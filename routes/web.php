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
//Route::get('/classes/create', [ClassController::class, 'create']);


Route::get('classes/index', [ClassController::class, 'index'])->name('classIndex');
Route::get('classes/create', [ClassController::class, 'create'])->name('classCreate');
Route::post('classes/store', [ClassController::class, 'store'])->name('classStore');
Route::get('classes/edit/{id}', [ClassController::class, 'edit'])->name('classEdit');
Route::post('classes/update/{id}', [ClassController::class, 'update'])->name('classUpdate');
Route::post('classes/delete/{id}', [ClassController::class, 'delete'])->name('classDelete');

Route::get('users/index', [UsersController::class, 'index'])->name('usersIndex');
Route::get('users/create', [UsersController::class, 'create'])->name('usersCreate');
Route::post('users/store', [UsersController::class, 'store'])->name('usersStore');
Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('usersEdit');
Route::post('users/update/{id}', [UsersController::class, 'update'])->name('usersUpdate');
Route::post('users/delete/{id}', [UsersController::class, 'delete'])->name('usersDelete');