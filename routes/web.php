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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile/update', [App\Http\Controllers\UserController::class, 'index'])->middleware(['auth:user'])->name('user.profile');
Route::post('/profile/update', [App\Http\Controllers\UserController::class, 'update'])->middleware(['auth:user']);
Route::get('/dashboard', function () {return redirect(route('user.message',  auth()->guard('user')->user()->username));})->middleware(['auth:user', 'profile'])->name('dashboard');
Route::get('/m/{username}', [App\Http\Controllers\MessageController::class, 'switch'])->name('user.message');
Route::post('/m/{username}', [App\Http\Controllers\MessageController::class, 'store'])->name('user.message.send');
Route::delete('/m/{username}', [App\Http\Controllers\MessageController::class, 'delete'])->name('user.message.clear');



// Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth:admin'])->name('admin.dashboard');
