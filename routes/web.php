<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',            [PageController::class, 'home'])->name('home');
Route::get('/home',        [PageController::class, 'home']);
Route::get('/about',       [PageController::class, 'about']);
Route::get('/mass-schedule',[PageController::class, 'massSchedule']);
Route::get('/sacraments',  [PageController::class, 'sacraments']);
Route::get('/ministries',  [PageController::class, 'ministries']);
Route::get('/news',        [PageController::class, 'news']);
Route::get('/gallery',     [PageController::class, 'gallery']);
Route::get('/resources',   [PageController::class, 'resources']);
Route::get('/donate',      [PageController::class, 'donate']);
Route::get('/flipbook',    [PageController::class, 'flipbook']);
Route::get('/contact',     [PageController::class, 'contact']);
Route::post('/contact',    [PageController::class, 'sendContact'])->name('contact.send');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
