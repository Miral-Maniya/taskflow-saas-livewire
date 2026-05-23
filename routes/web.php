<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Tasks\TaskTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/tasks', TaskTable::class)
    ->middleware(['auth'])
    ->name('web.tasks');    

Route::post('/logout', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');

})->name('logout');

require __DIR__.'/auth.php';
