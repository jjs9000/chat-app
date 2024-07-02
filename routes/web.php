<?php

use App\Http\Controllers\SocialiteController;
use App\Livewire\Chat\Index;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::get('/chat', Index::class)->name('chat.index');
});

// Routes for github and google authorization
Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])
    ->where('provider', 'github|google');
 
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])
    ->where('provider', 'github|google');

require __DIR__.'/auth.php';
