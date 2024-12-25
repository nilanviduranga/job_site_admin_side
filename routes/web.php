<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    // If the user is not logged in, render the login page using Inertia
    //return Inertia::render('login');
    return redirect()->route('login');


    // Otherwise, render the Welcome page
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
});


// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/jobs/pending_approve', function () {
    return Inertia::render('Jobsite/index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/jobs/categories', function () {
    return Inertia::render('Jobsite/Categories');
})->middleware(['auth', 'verified'])->name('categories');

Route::get('/jobs/approved', function () {
    return Inertia::render('Jobsite/ApprovedJobs');
})->middleware(['auth', 'verified'])->name('ApprovedJobs');

Route::get('/jobs/rejected', function () {
    return Inertia::render('Jobsite/RejectedJobs');
})->middleware(['auth', 'verified'])->name('RejectedJobs');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


Route::post('/store/category', [AdminController::class, 'store_category'])->name('store_category');
Route::get('/fetch/categories', [AdminController::class, 'fetch_categories'])->name('fetch_categories');

require __DIR__.'/auth.php';
