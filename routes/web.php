<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

// الصفحة الرئيسية
Route::get('/', function () {
    return view('home');
})->name('home');

// تبديل اللغة
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'en'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back()->withHeaders([
        'Cache-Control' => 'no-cache, no-store'
    ]);
})->name('lang.switch');



// Routes محتاجة Login
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Categories
    Route::resource('categories', CategoryController::class);

    // Expenses
    Route::resource('expenses', ExpenseController::class);

});

require __DIR__.'/auth.php';
