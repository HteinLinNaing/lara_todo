<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TodoListController::class, 'index'])->name('todo.index');
Route::post('/store', [TodoListController::class, 'store'])->name('todo.store');
Route::get('/edit/{id}', [TodoListController::class, 'edit'])->name('todo.edit');
Route::post('/update/{id}', [TodoListController::class, 'update'])->name('todo.update');
Route::delete('/destroy/{id}', [TodoListController::class, 'destroy'])->name('todo.destroy');

Route::get('/check/{id}', [TodoListController::class, 'check'])->name('todo.check');
Route::get('/uncheck/{id}', [TodoListController::class, 'uncheck'])->name('todo.uncheck');
