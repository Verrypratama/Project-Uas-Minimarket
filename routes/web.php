<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\GrafikRekapController;
use App\Http\Controllers\RekaptulasiController;

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
    return view('login');
});


Route::post('/login',[LoginController::class,'login']);
Route::get('/logout',[LoginController::class,'logout']);

//ADMIN
Route::get('/dashboard',[ProdukController::class,'dashboard']);
Route::get('/produk/{role}/{nama}',[ProdukController::class,'produk']);//tambah CRUD 
Route::get('/transaksi/{role}/{nama}',[TransaksiController::class,'transaksi']);
Route::get('/pegawai/{role}',[PegawaiController::class,'pegawai']);//tambah CRUD
Route::get('/rekaptulasi/{role}/{nama}',[GrafikRekapController::class,'rekaptulasi']);

//PEGAWAI
Route::get('/indexPegawai/{role}/{nama}', [PegawaiController::class, 'indexPegawai']);
Route::get('/addPegawai/{role}/{nama}', [PegawaiController::class, 'addPegawai']);
Route::get('editPegawai/{id}/{role}/{nama}', [PegawaiController::class, 'editPegawai'])->name('editPegawai');

Route::post('/createPegawai/{role}/{nama}', [PegawaiController::class, 'createPegawai']);
Route::post('/updatePegawai/{id}/{role}/{nama}', [PegawaiController::class, 'updatePegawai']);
Route::get('/delete/{role}/{nama}/{id}', [PegawaiController::class,'delete']);

//PRODUK
Route::get('/add/{role}/{nama}',[ProdukController::class,'add']);
Route::post('/addProduk/{role}/{nama}', [ProdukController::class, 'addProduk']);
Route::get('/edit/{role}/{nama}/{id}', [ProdukController::class, 'edit']);
Route::post('/editProduk/{role}/{nama}/{id}', [ProdukController::class, 'editProduk']);
Route::get('/delete/{role}/{nama}/{id}', [ProdukController::class, 'delete']);

//TRANSAKSI
Route::get('/dashboard/{role}/{nama}',[TransaksiController::class,'dashboard']);
Route::get('/transaksi/{role}/{nama}',[TransaksiController::class,'transaksi']);
Route::post('/rekaptulasi', [RekaptulasiController::class,'store']);