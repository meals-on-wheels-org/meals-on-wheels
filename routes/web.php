<?php

use App\Http\Controllers\CareGiverController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::resource('member',MemberController::class);
// Route::resource('careGiver',CareGiverController::class);
// Route::resource('partner',PartnerController::class);
// Route::resource('volunteer',VolunteerController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/member/form', [MemberController::class, 'create'])->name('member.form');
    Route::post('/member/form', [MemberController::class, 'store'])->name('member.store');

    Route::get('/caregiver/form', [CareGiverController::class, 'create'])->name('caregiver.form');
    Route::post('/caregiver/form', [CareGiverController::class, 'store'])->name('caregiver.store');
});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
