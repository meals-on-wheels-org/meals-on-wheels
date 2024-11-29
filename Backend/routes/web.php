<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// routes/web.php or routes/api.php
Route::get('/register', [AuthController::class, 'register']);
Route::get('/members', [MemberController::class, 'list']);
Route::get('/meal-plans', [MealPlanController::class, 'list']);
Route::get('/deliveries', [DeliveryController::class, 'list']);

