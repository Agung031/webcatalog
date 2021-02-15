<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataBarangController;

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

Route::get('/', function () {
    return view('welcome');
});

//Route data_barang
Route::get('/data_barang',[DataBarangController::class, 'index']);

//Route tambah_barang
Route::get('/data_barang/tambah_barang',[DataBarangController::class, 'tambah']);
Route::post('/tambah_barang/store',[DataBarangController::class, 'store']);

//Route edit_barang
Route::get('/data_barang/edit/{id}',[DataBarangController::class, 'edit']);
Route::post('/data_barang/update/{id}',[DataBarangController::class, 'update']);

//Route tambah_stock
Route::get('/data_barang/tambah_stock/{id}',[DataBarangController::class, 'tambah_stock']);
Route::post('/data_barang/proses_tambah/{id}',[DataBarangController::class, 'proses_tambah']);

//Route kurang_stock
Route::get('/data_barang/kurang_stock/{id}',[DataBarangController::class, 'kurang_stock']);
Route::post('/data_barang/proses_kurang/{id}',[DataBarangController::class, 'proses_kurang']);

//Route hapus_barang
Route::get('/data_barang/hapus/{id}',[DataBarangController::class, 'hapus']);