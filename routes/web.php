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
    $destinations = \App\Models\Destination::where('is_active', true)->orderBy('sort_order')->get();
    return view('side2.index', compact('destinations'));
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

// ─── Main Public Pages ────────────────────────────────────
Route::get('/services',     [App\Http\Controllers\PageController::class, 'services'])->name('services');
Route::get('/destinations', [App\Http\Controllers\PageController::class, 'destinations'])->name('destinations');
Route::get('/about',        [App\Http\Controllers\PageController::class, 'about'])->name('about');
Route::get('/contact',      [App\Http\Controllers\PageController::class, 'contact'])->name('contact');
Route::post('/contact',     [App\Http\Controllers\PageController::class, 'submitContact'])->name('contact.submit');

// ─── Inquiry handler (saves to DB) ────────────────────────
Route::post('/inquiry', [App\Http\Controllers\PageController::class, 'submitContact'])->name('inquiry.submit');

// ─── Newsletter subscription (AJAX) ──────────────────────
Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// ─── Travel Bookings (AJAX) ──────────────────────────────
Route::post('/bookings/store', [App\Http\Controllers\BookingController::class, 'store'])->name('bookings.store');

// ─── Admin Dashboard ────────────────────────────────────
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Services Management
    Route::get('/admin/services', [App\Http\Controllers\AdminController::class, 'servicesIndex'])->name('admin.services');
    Route::get('/admin/services/create', [App\Http\Controllers\AdminController::class, 'servicesCreate'])->name('admin.services.create');
    Route::post('/admin/services', [App\Http\Controllers\AdminController::class, 'servicesStore'])->name('admin.services.store');
    Route::get('/admin/services/{id}', [App\Http\Controllers\AdminController::class, 'servicesShow'])->name('admin.services.show');
    Route::get('/admin/services/{id}/edit', [App\Http\Controllers\AdminController::class, 'servicesEdit'])->name('admin.services.edit');
    Route::put('/admin/services/{id}', [App\Http\Controllers\AdminController::class, 'servicesUpdate'])->name('admin.services.update');
    Route::delete('/admin/services/{id}', [App\Http\Controllers\AdminController::class, 'servicesDestroy'])->name('admin.services.destroy');

    // Inquiries Management
    Route::get('/admin/inquiries', [App\Http\Controllers\AdminController::class, 'inquiriesIndex'])->name('admin.inquiries');
    Route::get('/admin/inquiries/{id}', [App\Http\Controllers\AdminController::class, 'inquiriesShow'])->name('admin.inquiries.show');
    Route::delete('/admin/inquiries/{id}', [App\Http\Controllers\AdminController::class, 'inquiriesDestroy'])->name('admin.inquiries.destroy');

    // Users Management
    Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'usersIndex'])->name('admin.users');
    Route::get('/admin/users/{id}', [App\Http\Controllers\AdminController::class, 'usersShow'])->name('admin.users.show');
    Route::delete('/admin/users/{id}', [App\Http\Controllers\AdminController::class, 'usersDestroy'])->name('admin.users.destroy');

    // Newsletter Management
    Route::get('/admin/newsletters', [App\Http\Controllers\AdminController::class, 'newslettersIndex'])->name('admin.newsletters');
    Route::put('/admin/newsletters/{id}/toggle', [App\Http\Controllers\AdminController::class, 'newslettersToggle'])->name('admin.newsletters.toggle');
    Route::delete('/admin/newsletters/{id}', [App\Http\Controllers\AdminController::class, 'newslettersDestroy'])->name('admin.newsletters.destroy');

    // Travel Bookings Management
    Route::get('/admin/bookings', [App\Http\Controllers\AdminController::class, 'bookingsIndex'])->name('admin.bookings');
    Route::put('/admin/bookings/{id}/status', [App\Http\Controllers\AdminController::class, 'bookingsUpdateStatus'])->name('admin.bookings.status');
    Route::delete('/admin/bookings/{id}', [App\Http\Controllers\AdminController::class, 'bookingsDestroy'])->name('admin.bookings.destroy');

    // Destinations Management
    Route::get('/admin/destinations', [App\Http\Controllers\AdminController::class, 'destinationsIndex'])->name('admin.destinations');
    Route::get('/admin/destinations/create', [App\Http\Controllers\AdminController::class, 'destinationsCreate'])->name('admin.destinations.create');
    Route::post('/admin/destinations', [App\Http\Controllers\AdminController::class, 'destinationsStore'])->name('admin.destinations.store');
    Route::get('/admin/destinations/{id}/edit', [App\Http\Controllers\AdminController::class, 'destinationsEdit'])->name('admin.destinations.edit');
    Route::put('/admin/destinations/{id}', [App\Http\Controllers\AdminController::class, 'destinationsUpdate'])->name('admin.destinations.update');
    Route::delete('/admin/destinations/{id}', [App\Http\Controllers\AdminController::class, 'destinationsDestroy'])->name('admin.destinations.destroy');
});
