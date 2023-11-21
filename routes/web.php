<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('login');
});

Route::prefix('admin')->group(function () {
    // Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');;
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.index');
        });

        Route::resource('users', UserController::class);
    });

});
