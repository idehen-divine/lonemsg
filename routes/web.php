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
    return view('welcome');
})->name('home');

Route::namespace('App\Http\Controllers')->middleware(['auth:user', 'verified'])->group(function () {
    Route::get('/messages', function () {
        return redirect()->route('message', auth()->guard('user')->user()->username);
    })->name('message');
    Route::get('/emai', function () {
        return view('welcome');
    })->name('home');
    Route::get('/messages/refresh', 'MessageController@refresh')->name('refresh');
    Route::delete('/{id}/delete', 'MessageController@destroy')->name('message.clear');
});

Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/{username}', 'MessageController@index')->name('message');
    Route::post('/{username}', 'MessageController@store')->name('message.send');
});
