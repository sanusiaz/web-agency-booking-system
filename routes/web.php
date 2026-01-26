<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', [BookingController::class, 'index'])->name('booking.index');
Route::post('/book', [BookingController::class, 'store'])->name('booking.store');

Route::view('/terms', 'legal.terms')->name('legal.terms');
Route::view('/privacy', 'legal.privacy')->name('legal.privacy');
Route::view('/cookies', 'legal.cookies')->name('legal.cookies');
