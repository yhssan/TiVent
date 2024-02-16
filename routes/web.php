<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
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


Route::get('/', [UserController::class ,'welcome'])->name('welcome');
Route::get('/login', [AuthController::class ,'login'])->name('login');
Route::post('/postlogin', [AuthController::class ,'postlogin'])->name('postlogin');
Route::get('/register', [AuthController::class ,'register'])->name('register');
Route::post('/postregister', [AuthController::class ,'postregister'])->name('postregister');

Route::get('/detail/{Event}', [UserController::class ,'detail'])->name('detail');

Route::middleware(['auth',])->group(function () {

    Route::get('/order', [UserController::class ,'order'])->name('order');
    Route::get('/history', [UserController::class ,'history'])->name('history');
    Route::get('/bayar/{detailOrder}', [UserController::class ,'bayar'])->name('bayar');
    Route::post('/postbayar/{detailOrder}', [UserController::class ,'postbayar'])->name('postbayar');

    Route::get('/batalkanpesanan/{detailOrder}', [UserController::class ,'batalkanpesanan'])->name('batalkanpesanan');
    Route::get('/postbayar', [UserController::class ,'postbayar'])->name('postbayar');
    
    Route::post('/postorder{Event}', [UserController::class ,'postorder'])->name('postorder');

    Route::get('/bayar/{detailorder}', [UserController::class, 'bayar'])->name('bayar');
    Route::post('/postbayar/{detailorder}', [UserController::class, 'postbayar'])->name('postbayar');

    Route::get('/logout', [AuthController::class ,'logout'])->name('logout');
});
