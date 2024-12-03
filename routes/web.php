<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FundraisingCampaignController;
use App\Http\Controllers\ReviewController;

// Home route
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Dashboard route (requires authentication)
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes (requires authentication)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Fundraising Campaign Route
Route::get('/fundraising', [FundraisingCampaignController::class, 'index'])->name('fundraising.index');

// Donation routes
Route::post('/donation', [DonationController::class, 'store'])->name('donations.store'); // Save a new donation

// Donor routes
Route::post('/donor', [DonorController::class, 'store'])->name('donors.store'); // Save a new donor

// Review routes
Route::post('/review', [ReviewController::class, 'store'])->name('reviews.store'); // Save a new review

// Authentication routes
require __DIR__.'/auth.php';
