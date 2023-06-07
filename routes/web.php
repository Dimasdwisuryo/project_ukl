<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/librarys', [LibraryController::class, 'index'])->name('library.index');
Route::get('/librarys/create', [LibraryController::class, 'create'])->name('library.create');
Route::post('/librarys', [LibraryController::class, 'store'])->name('library.store');
Route::get('/librarys/{id}/edit', [LibraryController::class, 'edit'])->name('library.edit');
Route::put('/librarys/{id}', [LibraryController::class, 'update'])->name('library.update');
Route::delete('/librarys/{id}', [LibraryController::class, 'destroy'])->name('library.destroy');

Route::get('/home_library', function () {
    return view('home_library');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
