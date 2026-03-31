<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landing.index');
Route::post('/leads', [LandingPageController::class, 'storeLead'])->name('landing.leads.store');
Route::post('/tracking/events', [LandingPageController::class, 'trackEvent'])->name('landing.tracking.event');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function (): void {
  Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('/leads', [DashboardController::class, 'leads'])->name('leads');
  Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
  Route::put('/settings', [DashboardController::class, 'updateSettings'])->name('settings.update');
});

Route::middleware('guest')->group(function (): void {
  Route::get('/login', function () {
    return view('auth.login');
  })->name('login');
  Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'store']);
});

Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'destroy'])->middleware('auth')->name('logout');
