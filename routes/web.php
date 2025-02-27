<?php

use App\Http\Controllers\CategoryController;
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


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.list');














Route::resource('contacts', App\Http\Controllers\ContactController::class);

Route::resource('categories', App\Http\Controllers\CategoryController::class);

Route::resource('queues', App\Http\Controllers\QueueController::class);

Route::resource('queue-technicians', App\Http\Controllers\QueueTechnicianController::class);

Route::resource('configurations', App\Http\Controllers\ConfigurationController::class);

Route::resource('configuration-histories', App\Http\Controllers\ConfigurationHistoryController::class);




Route::resource('categories', App\Http\Controllers\CategoryController::class);

Route::resource('queues', App\Http\Controllers\QueueController::class);

Route::resource('queue-technicians', App\Http\Controllers\QueueTechnicianController::class);

Route::resource('configurations', App\Http\Controllers\ConfigurationController::class);

Route::resource('configuration-histories', App\Http\Controllers\ConfigurationHistoryController::class);













