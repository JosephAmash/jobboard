<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\SavedJobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes für Job Board System
|--------------------------------------------------------------------------
|
| Hier werden alle Web-Routes für das Job Board System definiert.
| Includes: Public Routes, Auth Routes, und Protected Routes
|
*/

// Öffentliche Routes
Route::get('/', [JobController::class, 'index'])
    ->name('home');

// Job Routes mit gruppierten Middleware
Route::prefix('jobs')->group(function () {
    // Öffentliche Job Routes
    Route::get('/', [JobController::class, 'index'])
        ->name('jobs.index');

    Route::get('/{job}', [JobController::class, 'show'])
        ->name('jobs.show')
        ->where('job', '[0-9]+');

    // Geschützte Job Routes (nur für eingeloggte Benutzer)
    Route::middleware(['auth'])->group(function () {
        // Nur für Arbeitgeber
        Route::middleware(['employer'])->group(function () {
            Route::get('/create', [JobController::class, 'create'])
                ->name('jobs.create');

            Route::post('/', [JobController::class, 'store'])
                ->name('jobs.store');

            Route::get('/{job}/edit', [JobController::class, 'edit'])
                ->name('jobs.edit');

            Route::put('/{job}', [JobController::class, 'update'])
                ->name('jobs.update');

            Route::delete('/{job}', [JobController::class, 'destroy'])
                ->name('jobs.destroy');
        });
    });
});

// Gespeicherte Jobs Routes (nur für eingeloggte Benutzer)
Route::middleware(['auth'])->group(function () {
    Route::prefix('saved-jobs')->group(function () {
        Route::get('/', [SavedJobController::class, 'index'])
            ->name('saved.index');

        Route::post('/{job}', [SavedJobController::class, 'store'])
            ->name('saved.store');

        Route::delete('/{job}', [SavedJobController::class, 'destroy'])
            ->name('saved.destroy');
    });
});

// Auth Routes (von Breeze bereitgestellt)
require __DIR__.'/auth.php';
