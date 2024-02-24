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
    // route event
    Route::get('/order', [UserController::class ,'order'])->name('order');
    Route::get('/history', [UserController::class ,'history'])->name('history');
    Route::get('/bayar/{detailOrder}', [UserController::class ,'bayar'])->name('bayar');
    Route::post('/postbayar/{detailOrder}', [UserController::class ,'postbayar'])->name('postbayar');
    Route::get('/batalkanpesanan/{detailOrder}', [UserController::class ,'batalkanpesanan'])->name('batalkanpesanan');
    Route::post('/postorder{Event}', [UserController::class ,'postorder'])->name('postorder');

    // route admin
    Route::get('/admin/events', [AdminController::class,'events'])->name('admin');
    Route::get('/admin/events/tambah', [AdminController::class,'tambah'])->name('tambah');
    Route::post('/admin/events/posttambah', [AdminController::class,'posttambah'])->name('posttambah');
    Route::get('/admin/events/edit/{event}', [AdminController::class,'edit'])->name('edit');
    Route::post('/admin/events/postedit/{event}', [AdminController::class,'postedit'])->name('postedit');
    Route::get('/admin/events/hapus/{event}', [AdminController::class,'hapus'])->name('hapus');
    Route::post('/admin/events/{event}/update-status', [AdminController::class,'updateEventStatus'])->name('events.update-status');
    
    Route::get('/admin/pesanan', [AdminController::class,'pendingOrders'])->name('pesanan');
    Route::post('/admin/pesanan/{id}/update-status', [AdminController::class,'updateOrderStatus'])->name('pesanan.update-status');
    
    Route::get('/admin/log', [AdminController::class,'log'])->name('log');
    Route::get('/admin/riwayat', [AdminController::class,'completedRejectedOrders'])->name('riwayat');
    
    Route::get('/printRiwayatTransaksi', [AdminController::class,'printRiwayatTransaksi'])->name('printRiwayatTransaksi');
    Route::get('/printInvoiceTicket/{id}', [UserController::class,'printInvoiceTicket'])->name('printInvoiceTicket');

    Route::get('/logout', [AuthController::class ,'logout'])->name('logout');

});
