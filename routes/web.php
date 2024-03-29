<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [MainController::class, 'create'])->name('projects.create');
Route::post('/projects/create', [MainController::class, 'store'])->name('projects.store');
Route::get('/projects/{id}', [MainController::class, 'show'])->name('projects.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rotte Utente
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rotte Progetto
    Route::get('/projects/{id}/edit', [MainController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [MainController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [MainController::class, 'destroy'])->name('projects.destroy');
});

require __DIR__.'/auth.php';
