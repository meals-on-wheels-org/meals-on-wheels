<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/', function () {
    return Inertia::render('Homepage');
})->middleware(['auth', 'verified'])->name('homepage');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about-us', function () {
    return Inertia::render('AboutUs');
})->middleware(['auth', 'verified'])->name('aboutus');

Route::get('/donate', function () {
    return Inertia::render('FundraisingCampaigns');
})->middleware(['auth', 'verified'])->name('donate');

Route::get('/volunteer', function () {
    return Inertia::render('Volunteer');
})->middleware(['auth', 'verified'])->name('volunteer');

Route::get('/register-volunteer', function () {
    return Inertia::render('RegisterVolunteer');
})->middleware(['auth', 'verified'])->name('register-volunteer');

//Dash
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard/Index');
    });
    Route::get('/dashboard/customers', function () {
        return Inertia::render('Dashboard/Customers');
    });
    Route::get('/dashboard/products', function () {
        return Inertia::render('Dashboard/Products');
    });
    Route::get('/dashboard/orders', function () {
        return Inertia::render('Dashboard/Orders');
    });
    Route::get('/dashboard/analytics', function () {
        return Inertia::render('Dashboard/Analytics');
    });
    Route::get('/dashboard/settings', function () {
        return Inertia::render('Dashboard/Settings');
    });
});



Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Dashboard/Index', [
            'stats' => [
                'totalRevenue' => '$45,231.89',
                'subscriptions' => '+2350',
                'sales' => '+12,234',
                'activeUsers' => '+573',
            ]
        ]);
    })->name('dashboard');

    Route::get('/analytics', function () {
        return Inertia::render('Dashboard/Analytics', [
            'analyticsData' => [
                // Your analytics data here
            ]
        ]);
    })->name('dashboard.analytics');

    Route::get('/settings', function () {
        return Inertia::render('Dashboard/Settings');
    })->name('dashboard.settings');
});



Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/analytics', [DashboardController::class, 'analytics'])->name('dashboard.analytics');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
