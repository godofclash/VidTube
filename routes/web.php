<?php

use App\Http\Controllers\VideoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth'])->group(function() {
    Route::get('/', [VideoController::class, 'index'])->name('home');

    Route::get('videos/create', [VideoController::class, 'create'])->name('create');
    Route::post('/videos/store', [VideoController::class, 'store']);
});



Route::controller(UserController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

