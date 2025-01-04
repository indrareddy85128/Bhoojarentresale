<?php

use App\Http\Controllers\HomeController;
use App\Models\Loan;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/available-flats', [HomeController::class, 'available_flats'])->name('available-flats');
Route::get('/available-flats/{id}', [HomeController::class, 'available_flats_details'])->name('available-flats-details');
Route::post('/available-flats/store', [HomeController::class, 'available_flats_store'])->name('available-flats-store');
Route::get('/resale', [HomeController::class, 'resale'])->name('resale');
Route::post('/resale/store', [HomeController::class, 'resale_store'])->name('resale-store');
Route::get('/rent', [HomeController::class, 'rent'])->name('rent');
Route::post('/rent/store', [HomeController::class, 'rent_store'])->name('rent-store');
Route::get('/loans', [HomeController::class, 'loans'])->name('loans');
Route::post('/loans/store', [HomeController::class, 'loans_store'])->name('loans-store');
Route::get('/insurance', [HomeController::class, 'insurance'])->name('insurance');
Route::post('/insurance/store', [HomeController::class, 'insurance_store'])->name('insurance-store');
Route::get('/used-cars', [HomeController::class, 'used_cars'])->name('used-cars');
Route::post('/used-cars/store', [HomeController::class, 'used_cars_store'])->name('used-cars-store');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact/store', [HomeController::class, 'contact_store'])->name('contact-store');
