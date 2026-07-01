<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AccessLogController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class,'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class,'destroy'])->name('profile.destroy');

    Route::resource('cards', CardController::class);

    Route::post(
        '/cards/{card}/toggle',
        [CardController::class,'toggle']
    )->name('cards.toggle');

    Route::resource('devices', DeviceController::class);

    Route::post(
        '/devices/{device}/regenerate-key',
        [DeviceController::class, 'regenerateKey']
    )->name('devices.regenerate-key');

    Route::get('/permissions',[PermissionController::class,'index'])->name('permissions.index');

    Route::get('/logs',[AccessLogController::class,'index'])->name('logs.index');

    Route::get('/reports',[ReportController::class,'index'])->name('reports.index');

    Route::get('/settings',[SettingController::class,'index'])->name('settings.index');

});

require __DIR__.'/auth.php';
