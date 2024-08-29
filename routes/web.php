<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth', 'role:admin', 'role:approver1', 'role:approver2')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/formOrder', [OrderController::class, 'create'])->name('formOrder');
    Route::post('/add/order', [OrderController::class, 'store'])->name('order.submit');
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::post('/order/approve/{order}', [OrderController::class, 'approve'])->name('order.approve');
    Route::post('/order/reject/{order}', [OrderController::class, 'reject'])->name('order.reject');
    Route::post('/order/{order}/completed', [OrderController::class, 'completed'])->name('order.completed');
    Route::get('/order/export', [OrderController::class, 'export'])->name('order.export');

    Route::get('/log-activity', [OrderController::class, 'showLogActivity'])->name('log-activity');
});