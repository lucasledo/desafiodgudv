<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
