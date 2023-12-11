<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\HomeController;
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
});
