<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Site 1: Kasimbagu Consultancy Agency
Route::get('/consultacy', function () {
    return view('side1.index');
})->name('consultacy');

// Site 2: Kasimbagu Travelling Agency
Route::get('/travel', function () {
    return view('side2.index');
})->name('travel');

// Google OAuth (placeholder handlers)
Route::get('/auth/google/redirect', [App\Http\Controllers\Auth\SocialAuthController::class, 'googleRedirect'])->name('google.redirect');
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\SocialAuthController::class, 'googleCallback'])->name('google.callback');

// Email existence check for login SweetAlert flow
Route::post('/auth/check-email', [App\Http\Controllers\Auth\LoginController::class, 'checkEmail'])
    ->name('auth.checkEmail');

// Interstitial redirecting page after login
Route::get('/redirecting', function (\Illuminate\Http\Request $request) {
    $to = $request->query('to', url('/home'));
    return view('auth.redirecting', ['to' => $to]);
})->name('redirecting');
