<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auths Routes
|--------------------------------------------------------------------------
|
| Here is where you can register auths routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "auths" middleware group. Make something great!
|
*/

// Login routes
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
// Register routes
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

// User routes
Route::prefix('auth')->group(function () {
    // Password reset routes
    // Route::get('/password/reset', 'Auth\ForgotssPasswordController@showLinkRequestForm')->name('password.request');
    // Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    // Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    // Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

    // Email verification routes
    Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
});

// Admin routes
// Route::prefix('admin')->group(function () {
//     // Register routes
//     Route::get('/register', 'Auth\Admin\RegisterController@showRegistrationForm')->name('admin.register');
//     Route::post('/register', 'Auth\Admin\RegisterController@register');

//     // Login routes
//     Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
//     Route::post('/login', 'Auth\Admin\LoginController@login');

//     // Password reset routes
//     Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//     Route::post('/password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
//     Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('user.password.reset');
//     Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset');

//     // Email verification routes
//     Route::get('/email/verify', 'Auth\Admin\VerificationController@show')->name('admin.verification.notice');
//     Route::get('/email/verify/{id}/{hash}', 'Auth\Admin\VerificationController@verify')->name('admin.verification.verify');
//     Route::post('/email/resend', 'Auth\Admin\VerificationController@resend')->name('admin.verification.resend');

// });
