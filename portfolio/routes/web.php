<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ResumeController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\HeroPropertyController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('backend.pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //logout route
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

    //HeroProperty routes
    Route::get('/home/heroProperty',[HeroPropertyController::class, 'index'])->name('heroProperties.index');
    Route::post('/home/heroProperty',[HeroPropertyController::class, 'store'])->name('heroProperties.store');
    //About routes
    Route::get('/home/about',[AboutController::class, 'index'])->name('abouts.index');
    Route::post('/home/about',[AboutController::class, 'store'])->name('abouts.store');
    //Social routes
    Route::resource('/home/socials', SocialController::class);

    // Resume routes
    Route::get('/resume/download',[ResumeController::class, 'index'])->name('resume.index');
    Route::post('/resume/updateOrCreate',[ResumeController::class, 'store'])->name('resume.store');
});

require __DIR__.'/auth.php';

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/resume', [PageController::class, 'resume'])->name('resume');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

