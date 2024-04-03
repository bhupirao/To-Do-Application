<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/dashboard/notes', [NoteController::class, 'index'])->name('notes.index');
Route::get('/dashboard/notes/create', [NoteController::class, 'create'])->name('notes.create');
Route::post('/dashboard/notes', [NoteController::class, 'store'])->name('notes.store');
Route::get('/notes/{note}', [NoteController::class, 'show'])->name('notes.show');
Route::get('/dashboard/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
Route::put('/dashboard/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
Route::delete('/dashboard/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
Route::put('/notes/{id}/update-status', [NoteController::class, 'updateStatus'])->name('notes.updateStatus');



require __DIR__.'/auth.php';
