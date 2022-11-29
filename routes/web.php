<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublicController;
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
    return Inertia::render('Home');
});

Route::get('/contact', function () {
    return Inertia::render('Contact');
});

Route::get('/projects', [PublicController::class, 'projects']);

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');
    
    Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectController::class, 'list']);
        Route::get('/create', function () {
            return Inertia::render('Admin/CreateProject');
        });
        Route::get('/{id}', [ProjectController::class, 'view']);
        Route::post('/create', [ProjectController::class, 'create']);
        Route::post('/edit/{id}', [ProjectController::class, 'edit']);
        Route::delete('/delete/{id}', [ProjectController::class, 'delete']);
    });
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
