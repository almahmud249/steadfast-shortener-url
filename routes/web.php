<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// routes/web.php
require __DIR__.'/auth.php';

use App\Http\Controllers\UrlController;

Route::middleware(['auth'])->group(function () {
    Route::get('/shorten', [UrlController::class, 'shorten']);
    Route::post('/shorten', [UrlController::class, 'store'])->name('shorten.store');
    Route::get('/statistics', [UrlController::class, 'statistics'])->name('shorten.statistics');
});

Route::get('/{shortUrl}', [UrlController::class, 'redirect']);

