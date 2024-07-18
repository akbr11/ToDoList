<?php

use App\Http\Controllers\ToDo\ToDoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ToDoController::class, 'index'])->name('index');
Route::post('/', [ToDoController::class, 'store'])->name('todo.post');
