<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\CardController;

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
Route::get('/', [AuthController::class, 'loginIndex']);
Route::get('/login', [AuthController::class, 'loginIndex'])->name('login');
Route::post('/custom-login', [AuthController::class, 'loginAuth'])->name('custom.login');
Route::get('/register', [AuthController::class, 'registerIndex'])->name('register');
Route::post('/custom-registration', [AuthController::class, 'registerAuth'])->name('custom.register');
Route::get('/feed', [FeedController::class, 'feed'])->name('feed');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('classes', [ClassController::class, 'index'])->name('classIndex');
Route::get('classes/index', [ClassController::class, 'index'])->name('classIndex');
Route::get('classes/create', [ClassController::class, 'create'])->name('classCreate');
Route::post('classes/store', [ClassController::class, 'store'])->name('classStore');
Route::get('classes/edit/{id}', [ClassController::class, 'edit'])->name('classEdit');
Route::post('classes/update/{id}', [ClassController::class, 'update'])->name('classUpdate');
Route::post('classes/delete/{id}', [ClassController::class, 'delete'])->name('classDelete');

Route::get('users', [UsersController::class, 'index'])->name('usersIndex');
Route::get('users/index', [UsersController::class, 'index'])->name('usersIndex');
Route::get('users/create', [UsersController::class, 'create'])->name('usersCreate');
Route::post('users/store', [UsersController::class, 'store'])->name('usersStore');
Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('usersEdit');
Route::post('users/update/{id}', [UsersController::class, 'update'])->name('usersUpdate');
Route::post('users/delete/{id}', [UsersController::class, 'delete'])->name('usersDelete');

Route::get('cards', [CardController::class, 'index'])->name('cardsIndex');
Route::get('cards/index', [CardController::class, 'index'])->name('cardsIndex');
Route::get('cards/create', [CardController::class, 'create'])->name('cardsCreate');
Route::post('cards/store', [CardController::class, 'store'])->name('cardsStore');
Route::get('cards/edit/{id}', [CardController::class, 'edit'])->name('cardsEdit');
Route::post('cards/update/{id}', [CardController::class, 'update'])->name('cardsUpdate');
Route::post('cards/delete/{id}', [CardController::class, 'delete'])->name('cardsDelete');