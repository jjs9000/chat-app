<?php

use App\Http\Controllers\SocialiteController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/chat', function(){
    $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('chat-list',[
            'users' => $users
        ]);
    })->middleware(['auth', 'verified'])->name('chat-list');


Route::get('/chat/{id}', function($id){
        return view('chat',[
            'id' => $id
        ]);
    })->middleware(['auth', 'verified'])->name('chat');

// Routes for github and google authorization
Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])
    ->where('provider', 'github|google');
 
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])
    ->where('provider', 'github|google');

require __DIR__.'/auth.php';
