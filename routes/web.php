<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Home
Route::get('/', [HomeController::class, 'index'])->name('home');

//Todo

Route::prefix('todo')->group(function () {
    Route::get('/', [TodoController::class, 'index'])->name('todo');
    Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
    Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
    Route::get('/done/{id}', [TodoController::class, 'done'])->name('todo.done');
    Route::get('/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
});
