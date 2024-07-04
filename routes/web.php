<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/obat', [App\Http\Controllers\ObatController::class, 'index'])->name('obat');
Route::post('/obat', [App\Http\Controllers\ObatController::class, 'store'])->name('obat.store');
Route::delete('/obat/{id}', [App\Http\Controllers\ObatController::class, 'destroy'])->name('obat.destroy');
Route::put('/obat/{id}', [App\Http\Controllers\ObatController::class, 'update'])->name('obat.update');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::delete('/user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
Route::put('/user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::get('/obat_masuk', [App\Http\Controllers\ObatMasukController::class, 'index'])->name('obat_masuk');
Route::post('/obat_masuk', [App\Http\Controllers\ObatMasukController::class, 'store'])->name('obat_masuk.store');
Route::delete('/obat_masuk/{id}', [App\Http\Controllers\ObatMasukController::class, 'destroy'])->name('obat_masuk.destroy');
Route::put('/obat_masuk/{id}', [App\Http\Controllers\ObatMasukController::class, 'update'])->name('obat_masuk.update');

Route::get('/obat_keluar', [App\Http\Controllers\ObatKeluarController::class, 'index'])->name('obat_keluar');
Route::post('/obat_keluar', [App\Http\Controllers\ObatKeluarController::class, 'store'])->name('obat_keluar.store');
Route::delete('/obat_keluar/{id}', [App\Http\Controllers\ObatKeluarController::class, 'destroy'])->name('obat_keluar.destroy');
Route::put('/obat_keluar/{id}', [App\Http\Controllers\ObatKeluarController::class, 'update'])->name('obat_keluar.update');

Route::get('/supplier', [App\Http\Controllers\SupplierController::class, 'index'])->name('supplier');
Route::post('/supplier', [App\Http\Controllers\SupplierController::class, 'store'])->name('supplier.store');
Route::delete('/supplier/{id}', [App\Http\Controllers\SupplierController::class, 'destroy'])->name('supplier.destroy');
Route::put('/supplier/{id}', [App\Http\Controllers\SupplierController::class, 'update'])->name('supplier.update');

Route::get('/ropeoq', [App\Http\Controllers\RopEoqController::class, 'index'])->name('ropeoq');


Route::get('/dashboard', function () {
    return view('dashboard');
});

Auth::routes();
