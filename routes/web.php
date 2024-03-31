<?php

use App\Http\Controllers\BannerController;
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
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/', [HomeController::class, 'index'])->name('home');

//Todo

Route::prefix('todo')->group(function () {
    Route::get('/', [TodoController::class, 'index'])->name('todo');
    Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
    Route::get('/edit', [TodoController::class, 'edit'])->name('todo.edit');
    Route::post('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
    Route::get('/done/{id}', [TodoController::class, 'done'])->name('todo.done');
    Route::get('/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
});

Route::prefix('banner')->group(function () {
    Route::get('/', [BannerController::class, 'index'])->name('banner');
    Route::post('/store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/edit', [BannerController::class, 'edit'])->name('banner.edit');
    Route::get('/status/{id}', [BannerController::class, 'status'])->name('banner.status');
    Route::post('/update/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::get('/delete/{id}', [BannerController::class, 'delete'])->name('banner.delete');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
