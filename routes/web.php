<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::view('/', 'welcome');

Route::get('/dashboard', function () {
    $users = User::whereNotIn('id', [auth()->id()])->get();
    return view('dashboard', [
        'users' => $users
    ]);
})->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/chat/{user_id}', function ($user_id) {
    return view('chat', [
        'user_id' => $user_id
    ]);
})->middleware(['auth', 'verified'])
    ->name('chat');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
