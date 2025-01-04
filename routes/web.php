<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/available-flats', [HomeController::class, 'available_flats'])->name('available-flats');
Route::get('/available-flats/{id}', [HomeController::class, 'available_flats_details'])->name('available-flats-details');
Route::get('/resale', [HomeController::class, 'resale'])->name('resale');
Route::get('/rent', [HomeController::class, 'rent'])->name('rent');
Route::get('/loans', [HomeController::class, 'loans'])->name('loans');
Route::get('/insurance', [HomeController::class, 'insurance'])->name('insurance');
Route::get('/used-cars', [HomeController::class, 'used_cars'])->name('used-cars');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/Lead/store', [HomeController::class, 'leadStore'])->name('lead.store');
