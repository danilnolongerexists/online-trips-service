<?php

use App\Models\User;
use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActionsController;
use App\Http\Controllers\OrderController;

Route::get('/', [ViewsController::class, 'index'])->name('index');
Route::get('/register', [ViewsController::class, 'register'])->name('register')->middleware('guest');
Route::get('/login', [ViewsController::class, 'login'])->name('login')->middleware('guest');
Route::post('/register', [ActionsController::class, 'register']);
Route::post('/login', [ActionsController::class, 'login']);
Route::get('/logout', [ActionsController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/vehicle/{vehicle}', [ViewsController::class, 'vehicle'])->name('vehicle.show');
Route::get('/orders', [ViewsController::class, 'orders'])->name('orders')->middleware('auth');
Route::post('/checkout/{vehicle}', [OrderController::class, 'checkout'])->name('order.checkout')->middleware('auth');
Route::post('/orders/{id}/review', [ActionsController::class, 'create_review'])->name('trips.review')->middleware('auth');
