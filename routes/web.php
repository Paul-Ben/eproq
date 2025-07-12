<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('about', [FrontEndController::class, 'about'])->name('about');
Route::get('tenders', [FrontEndController::class, 'tenders'])->name('tenders');
Route::get('awards', [FrontEndController::class, 'awards'])->name('awards');
Route::get('news', [FrontEndController::class,'news'])->name('news');
Route::get('press', [FrontEndController::class,'press'])->name('press');
Route::get('contact', [FrontEndController::class,'contact'])->name('contact');
Route::post('/contact', [FrontEndController::class, 'submit'])->name('contact.submit');


// Redirect authenticated users to their role-specific dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    
});
// Role-specific dashboard routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Superadmin routes
    Route::get('/superadmin/dashboard', function () {
        return view('dashboards.superadmin');
    })->middleware('role:superadmin')->name('superadmin.dashboard');

    // Admin routes
    Route::get('/admin/dashboard', function () {
        return view('dashboards.admin');
    })->middleware('role:admin')->name('admin.dashboard');

    // Procurement Officer routes
    Route::get('/procurement-officer/dashboard', function () {
        return view('dashboards.procurement-officer');
    })->middleware('role:procurement-officer')->name('officer.dashboard');

    // Vendor routes
    Route::get('/vendor/dashboard', function () {
        return view('dashboards.vendor');
    })->middleware('role:vendor')->name('vendor.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
