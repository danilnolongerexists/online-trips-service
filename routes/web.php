<?php

use App\Models\User;
use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActionsController;

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [ViewsController::class, 'index'])->name('index');
Route::get('/register', [ViewsController::class, 'register'])->name('register')->middleware('guest');
Route::get('/login', [ViewsController::class, 'login'])->name('login')->middleware('guest');
Route::post('/register', [ActionsController::class, 'register']);
Route::post('/login', [ActionsController::class, 'login']);
Route::get('/logout', [ActionsController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/profile', [ViewsController::class, 'profile'])->name('profile')->middleware('auth');
