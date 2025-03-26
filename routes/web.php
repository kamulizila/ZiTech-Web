<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TechSolutionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\GetStartedController;
use App\Http\Controllers\NameserversController;
use App\Http\Controllers\BillingDetailsController;
use App\Http\Controllers\OrderController;

// Home Page
Route::get('/', [TechSolutionController::class, 'index'])->name('home');

// Registration
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Display login form
// Route::post('/login', [AuthController::class, 'login']); // Process login request
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Dashboard (Protected Route)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Domain Routes
Route::post('/check-domain', [DomainController::class, 'checkDomain']);
Route::get('/payment/page', [DomainController::class, 'paymentPage'])->name('payment.page');
Route::get('/payment/success', [DomainController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment/cancel', [DomainController::class, 'paymentCancel'])->name('payment.cancel');


// Get Started
Route::post('/get-started', [GetStartedController::class, 'store'])->name('get-started.store');

// Nameservers
Route::get('/nameservers', [NameserversController::class, 'show'])->name('nameservers');
Route::post('/save-nameservers', [NameserversController::class, 'save'])->name('save-nameservers');

// Billing Details
Route::get('/billing-details', [BillingDetailsController::class, 'show'])->name('billing-details');
Route::post('/save-billing-details', [BillingDetailsController::class, 'save'])->name('save-billing-details');

// Order
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

// Career Routes
Route::prefix('careers')->group(function () {
    Route::view('/open-positions', 'careers.open-positions')->name('careers.open-positions');
    Route::view('/submit-application', 'careers.submit-application')->name('careers.submit-application');
    Route::view('/join-team', 'careers.join-team')->name('careers.join-team');
    Route::view('/explore-jobs', 'careers.explore-jobs')->name('careers.explore-jobs');
});

use App\Http\Controllers\AdminHomeController;

Route::get('/admin-home', [AdminHomeController::class, 'index'])->name('admin.home')->middleware('auth');

Route::get('/orders/{id}', [OrderController::class, 'view'])->name('order.view');

Route::post('/orders/{id}/confirm', [OrderController::class, 'confirm'])->name('order.confirm');

Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('order.delete');



Route::get('/requests/{id}', [GetStartedController::class, 'show'])->name('request.view');
Route::delete('/requests/{id}', [GetStartedController::class, 'delete'])->name('request.delete');
Route::post('/requests/{id}/confirm', [GetStartedController::class, 'confirm'])->name('request.confirm');

use App\Http\Controllers\AdminController;

// Show the registration form
Route::get('/admin/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');

// Handle the registration form submission
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register.submit');

Route::delete('/admin/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');

use App\Http\Controllers\ApplicationController;

Route::post('/careers/submit-application', [ApplicationController::class, 'submitApplication'])->name('careers.submit-application');

// Admin route
Route::get('/admin/manage-applications', [ApplicationController::class, 'manageApplications'])->middleware('auth')->name('admin.manage-applications');

use App\Http\Controllers\ContactController;

Route::post('/contact', [ContactController::class, 'store']);

use App\Http\Controllers\AdminContactController;

Route::get('/admin/messages', [AdminContactController::class, 'index'])->name('admin.messages');
Route::post('/admin/messages/reply/{id}', [AdminContactController::class, 'reply'])->name('admin.reply');

use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home'); // Redirect to login page after logout
})->name('logout');


Route::delete('/admin/messages/{id}', [AdminContactController::class, 'deleteMessage'])->name('admin.deleteMessage');

Route::delete('/admin/applications/{id}', [AdminController::class, 'deleteApplication'])->name('admin.deleteApplication');


// Route::get('login', function () {
//     return view('auth.login');
// })->name('login');
