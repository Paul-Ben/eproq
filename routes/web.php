<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Vendor\VendorController;

Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::get('about', [FrontEndController::class, 'about'])->name('about');
Route::get('tenders', [FrontEndController::class, 'tenders'])->name('tenders');
Route::get('awards', [FrontEndController::class, 'awards'])->name('awards');
Route::get('news', [FrontEndController::class,'news'])->name('news');
Route::get('press', [FrontEndController::class,'press'])->name('press');
Route::get('contact', [FrontEndController::class,'contact'])->name('contact');
Route::post('/contact', [FrontEndController::class, 'submitContactForm'])->name('contact.submit');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Two Factor Authentication Routes
    Route::get('/two-factor', [TwoFactorController::class, 'index'])->name('two-factor.index');
    Route::post('/two-factor', [TwoFactorController::class, 'store'])->name('two-factor.store');
    Route::get('/two-factor/resend', [TwoFactorController::class, 'resend'])->name('two-factor.resend');

    // Admin dashboard
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('dashboards.admin');
        })->name('admin.dashboard');
    });

    // Procurement Officer dashboard
    Route::middleware(['role:procurement-officer'])->group(function () {
        Route::get('/procurement-officer/dashboard', function () {
            return view('dashboards.procurement-officer');
        })->name('officer.dashboard');
    });

    // Vendor dashboard
    Route::middleware(['role:vendor'])->group(function () {
        Route::get('/vendor/dashboard', function () {
            return view('dashboards.vendor');
        })->name('vendor.dashboard');
        Route::get('/vendor/adddocument', [VendorController::class, 'addDocument'])->name('vendor.adddocument');
        Route::post('/vendor/adddocument', [VendorController::class, 'storeDocument'])->name('vendor.storeDocument');
    });

    // User Management & MDA Management (Superadmin only)
    Route::middleware(['role:superadmin'])->group(function () {
        Route::get('/superadmin/dashboard', function () {
            return view('dashboards.superadmin');
        })->name('superadmin.dashboard');

        Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
        Route::put('/users/{user}/update-role', [UserManagementController::class, 'updateRole'])->name('users.update-role');
        Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
        Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management.index');

        // MDA Management Routes
        Route::get('/mda', [SuperAdminController::class, 'mdaIndex'])->name('mda.index');
        Route::post('/mda', [SuperAdminController::class, 'storeMda'])->name('mda.store');
        Route::put('/mda/{id}', [SuperAdminController::class, 'updateMda'])->name('mda.update');
        Route::delete('/mda/{id}', [SuperAdminController::class, 'deleteMda'])->name('mda.destroy');
    });
});

require __DIR__.'/auth.php';
