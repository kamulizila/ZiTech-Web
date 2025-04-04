<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TechSolutionController,
    AuthController,
    DashboardController,
    DomainController,
    GetStartedController,
    NameserversController,
    BillingDetailsController,
    OrderController,
    AdminController,
    AdminHomeController,
    ApplicationController,
    ContactController,
    AdminContactController
};

// Home Page
Route::get('/', [TechSolutionController::class, 'index'])->name('home');

// Authentication Routes
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Display login form
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home'); // Redirect to home after logout
})->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

// Domain Routes
Route::prefix('domain')->group(function () {
    Route::post('/check-domain', [DomainController::class, 'checkDomain']);
    Route::get('/payment/page', [DomainController::class, 'paymentPage'])->name('payment.page');
    Route::get('/payment/success', [DomainController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/cancel', [DomainController::class, 'paymentCancel'])->name('payment.cancel');
});

// Get Started Routes
Route::post('/get-started', [GetStartedController::class, 'store'])->name('get-started.store');

// Nameservers Routes
Route::prefix('nameservers')->group(function () {
    Route::get('/', [NameserversController::class, 'show'])->name('nameservers');
    Route::post('/save', [NameserversController::class, 'save'])->name('save-nameservers');
});

// Billing Details Routes
Route::prefix('billing')->group(function () {
    Route::get('/details', [BillingDetailsController::class, 'show'])->name('billing-details');
    Route::post('/save', [BillingDetailsController::class, 'save'])->name('save-billing-details');
});

// Order Routes
Route::prefix('order')->group(function () {
    Route::post('/', [OrderController::class, 'store'])->name('order.store');
    Route::get('/{id}', [OrderController::class, 'view'])->name('order.view');
    Route::post('/{id}/confirm', [OrderController::class, 'confirm'])->name('order.confirm');
    Route::delete('/{id}', [OrderController::class, 'destroy'])->name('order.delete');
});

// Career Routes
Route::prefix('careers')->group(function () {
    Route::view('/open-positions', 'careers.open-positions')->name('careers.open-positions');
    Route::view('/submit-application', 'careers.submit-application')->name('careers.submit-application');
    Route::view('/join-team', 'careers.join-team')->name('careers.join-team');
    Route::view('/explore-jobs', 'careers.explore-jobs')->name('careers.explore-jobs');
    Route::post('/submit-application', [ApplicationController::class, 'submitApplication'])->name('careers.submit-application');
});

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');

    // Admin Registration Routes
    Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'register'])->name('admin.register.submit');
    Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // Admin Applications Management
    Route::get('/manage-applications', [ApplicationController::class, 'manageApplications'])->name('admin.manage-applications');
    Route::delete('/applications/{id}', [AdminController::class, 'deleteApplication'])->name('admin.deleteApplication');

    // Admin Contact Routes
    Route::get('/messages', [AdminContactController::class, 'index'])->name('admin.messages');
    Route::post('/messages/reply/{id}', [AdminContactController::class, 'reply'])->name('admin.reply');
    Route::delete('/messages/{id}', [AdminContactController::class, 'deleteMessage'])->name('admin.deleteMessage');
});

// Requests Routes
Route::prefix('requests')->group(function () {
    Route::get('/{id}', [GetStartedController::class, 'show'])->name('request.view');
    Route::delete('/{id}', [GetStartedController::class, 'delete'])->name('request.delete');
    Route::post('/{id}/confirm', [GetStartedController::class, 'confirm'])->name('request.confirm');
});

// Contact Routes
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/userdashboard', function () {
    return view('user-dashboard');
})->middleware('auth');

// Home page with iframe
Route::get('/home', function () {
    return view('home');
})->middleware('auth');

// Iframe content routes
Route::get('/home-content', function () {
    return view('home-content');
})->middleware('auth')->name('home-content');

Route::get('/profile-content', function () {
    return view('profile-content');
})->middleware('auth')->name('profile-content');

// Add other content routes as needed
