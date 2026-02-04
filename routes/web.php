<?php

use App\Livewire\Home;
use App\Livewire\Page;
use App\Livewire\Task;
use Illuminate\Console\View\Components\Task as ComponentsTask;
use Illuminate\Support\Facades\Route;




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
Route::get('/', Home::class)->name('livewire.home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/tasks', Task::class)->name('tasks');
Route::get('/page', Page::class)->name('page');

Route::get('/tasks/{id}/edit', Task::class)->name('tasks.edit');
Route::get('/tasks', Task::class)->name('tasks.create');    
Route::post('/tasks', Task::class)->name('tasks.store');
Route::put('/tasks/{id}', Task::class)->name('tasks.update');
Route::delete('/tasks/{id}', Task::class)->name('tasks.destroy');       
Route::get('/page', Page::class)->name('page');
Route::get('/tasks/{id}/edit', Task::class)->name('tasks.edit');








