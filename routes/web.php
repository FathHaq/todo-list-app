<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');
    Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/todo-list', [HomeController::class, 'todoStore'])->name('todo.store');
    Route::patch('/todo-list/{id}/update-status', [HomeController::class, 'todoUpdateStatus'])->name('todo.update-status');
    Route::delete('/todo-list/{id}/delete', [HomeController::class, 'todoDelete'])->name('todo.delete');
});
