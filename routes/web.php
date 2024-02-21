<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return Inertia::render('Welcome', 
    [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('works', WorkController::class)
->middleware(['auth', 'verified']);


Route::get('/commission', function () {
    return Inertia::render('Commission');
})->middleware(['auth', 'verified'])->name('commission');


Route::get('/introduction', function () {
    return Inertia::render('Introduction',[
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION, 
    ]);
})->name('introduction');


Route::get('/explanation', function () {
    return Inertia::render('Explanation',[
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('explanation');

// Route::get('/introduction', function () {
//     return Inertia::render('Introduction');
// })->middleware(['auth', 'verified'])->name('introduction');

// Route::get('/explanation', function () {
//     return Inertia::render('Explanation');
// })->middleware(['auth', 'verified'])->name('explanation');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
