<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\SavedJobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Welcome page for guests (NOT logged in)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Dashboard for logged in users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Jobs Routes
Route::get('/home', [JobController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

// Job Routes with grouped middleware
Route::prefix('jobs')->group(function () {
    // Public Job Routes
    Route::get('/', [JobController::class, 'index'])
        ->name('jobs.index');

    Route::get('/{job}', [JobController::class, 'show'])
        ->name('jobs.show')
        ->where('job', '[0-9]+');

    // Routes for logged-in users
    Route::middleware(['auth'])->group(function () {
        // Employer only routes
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

// Routes for logged-in users
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

require __DIR__.'/auth.php';
