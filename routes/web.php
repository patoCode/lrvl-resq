<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConfigurationController;
USE App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::class);
Route::resource('configurations', ConfigurationController::class);
Route::resource('contacts', ContactController::class)->only(['store', 'create']);

Route::get('/categories/{id}/colas', [CategoryController::class, 'obtenerColas']);
Route::post('/colas/agregar-tecnico', [CategoryController::class, 'agregarTecnico']);
