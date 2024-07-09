<?php

use App\Http\Controllers\SocialiteController;
use App\Livewire\ChatComponent;
use App\Livewire\ChatList;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Route for chat list and chat box components
Route::get('/chat', ChatList::class)->middleware(['auth', 'verified'])->name('chat-list');
Route::get('/chat/{user_id}', ChatComponent::class)->middleware(['auth', 'verified'])->name('chat');

// Routes for github and google authorization
Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])
    ->where('provider', 'github|google');
 
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])
    ->where('provider', 'github|google');

require __DIR__.'/auth.php';
