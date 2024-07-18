<?php

use App\Http\Controllers\ToDo\ToDoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ToDoController::class, 'index'])->name('index');
Route::post('/', [ToDoController::class, 'store'])->name('todo.post');
Route::put('/{id}', [ToDoController::class, 'update'])->name('todo.update');
Route::delete('/{id}', [ToDoController::class, 'destroy'])->name('todo.delete');
