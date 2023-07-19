<?php

use App\Http\Controllers\BarangsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\BarangController::class, 'index']);

Route::get('barang', [App\Http\Controllers\BarangController::class, 'index']);
Route::get('pasien', [App\Http\Controllers\PasienController::class, 'index']);
Route::get('invoice', [App\Http\Controllers\InvoiceController::class, 'index']);
Route::post('barang-create', [App\Http\Controllers\BarangController::class, 'store']);
Route::post('pasien-create', [App\Http\Controllers\PasienController::class, 'store']);
Route::post('invoice-create', [App\Http\Controllers\InvoiceController::class, 'store']);
Route::get('barang/delete/{id}', [App\Http\Controllers\BarangController::class, 'destroy']);
Route::get('pasien/delete/{id}', [App\Http\Controllers\PasienController::class, 'destroy']);
Route::get('invoice/delete/{id}', [App\Http\Controllers\InvoiceController::class, 'destroy']);
Route::get('invoice/show/{id}', [App\Http\Controllers\InvoiceController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
