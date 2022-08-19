<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;

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



Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login.index');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('login.post');


Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
    Route::prefix('posts')->group(function () {
        Route::get('/edit/{id}', [\App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
        Route::post('/update', [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
        Route::post('/delete', [\App\Http\Controllers\PostController::class, 'delete'])->name('posts.delete');
        Route::get('/logout', [\App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');
    });
});
