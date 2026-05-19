<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\PageContentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'loginPost'])
    ->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
Route::get('/dashboard', [HomeController::class, 'index'])
    ->name('dashboard');
Route::resource('page-content', PageContentController::class);