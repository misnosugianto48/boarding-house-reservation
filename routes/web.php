<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/cities/{slug}', [CityController::class, 'show'])->name('cities.show');

Route::get('/find-kos', [BoardingHouseController::class, 'find'])->name('find');

Route::get('/boarding-houses/{slug}', [BoardingHouseController::class, 'show'])->name('boarding-houses.show');
Route::get('/boarding-houses/{slug}/rooms', [BoardingHouseController::class, 'rooms'])->name('boarding-houses.room');

Route::get('/find-results', [BoardingHouseController::class, 'findResults'])->name('find.results');

Route::get('/check-booking', [BookingController::class, 'check'])->name('check-booking');
