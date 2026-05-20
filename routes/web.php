<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\EntrepreneurController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::middleware(['auth'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // PROJECT CRUD
    Route::resource('projects', ProjectController::class);

    // SKILL CRUD
    Route::resource('skills', SkillController::class);

    // ENTREPRENEUR CRUD
    Route::resource('entrepreneurs', EntrepreneurController::class);

});

require __DIR__.'/auth.php';