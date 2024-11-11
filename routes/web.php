<?php

use Illuminate\Support\Facades\Route;


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/', \App\Livewire\Tasks\Index::class)->name('tasks.index');
Route::get('/tasks', \App\Livewire\Tasks\Index::class)->name('tasks.index');
Route::get('/tasks/create', \App\Livewire\Tasks\Create::class)->name('tasks.create');
Route::get('/tasks/show/{task}', \App\Livewire\Tasks\Show::class)->name('tasks.show');
Route::get('/tasks/update/{task}', \App\Livewire\Tasks\Edit::class)->name('tasks.edit');

require __DIR__.'/auth.php';
