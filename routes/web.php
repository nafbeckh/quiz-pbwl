<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'authenticate']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/golongan', [GolonganController::class, 'index'])->name('golongan');
    Route::get('/golongan/create', [GolonganController::class, 'create'])->name('golongan.create');
    Route::post('/golongan/create', [GolonganController::class, 'store']);
    Route::get('/golongan/edit/{id}', [GolonganController::class, 'edit'])->name('golongan.edit');
    Route::put('/golongan/edit/{id}', [GolonganController::class, 'update']);
    Route::delete('/golongan/delete/{id}', [GolonganController::class, 'destroy'])->name('golongan.delete');

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/create', [UserController::class, 'store']);
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/edit/{id}', [UserController::class, 'update']);
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
    Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('/pelanggan/create', [PelangganController::class, 'store']);
    Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::put('/pelanggan/edit/{id}', [PelangganController::class, 'update']);
    Route::delete('/pelanggan/delete/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.delete');
});
