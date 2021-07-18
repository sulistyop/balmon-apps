<?php

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PerangkatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/peminjaman', [PeminjamanController::class, 'index']);

//Route input Data Create Read Update Delete @resource
Route::resource('/pegawai', PegawaiController::class);
Route::resource('/perangkat', PerangkatController::class);
//Route::resource('/peminjaman', PeminjamanController::class);
