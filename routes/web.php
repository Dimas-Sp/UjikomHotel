<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataKamarController;
use App\Http\Controllers\DatFasKamarController;
use App\Models\tipe_kamar;


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

Route::post('/login', [LoginController::class, 'takeAll']);

Route::get('/login/dashboard', [LoginController::class, 'dashboard']);

Route::get('/kamar/{id}', [DataKamarController::class, 'takeAll']);

Route::get('/kamar/ubah/{id}', [DataKamarController::class, 'ubah']);

Route::post('/kamar/update', [DataKamarController::class, 'update']);

Route::get('/kamar/lihat/{id}', [DataKamarController::class, 'lihat']);

Route::get('/kamar/{id}/tambahData', [DataKamarController::class, 'tambah']);

Route::post('/kamar/store', [DataKamarController::class, 'store']);



Route::get('/', function () {
    return view('login');
});

Route::get('DatFasKamar', [DatFasKamarController::class, 'index']);

Route::get('/DatFasHotel', function () {
    return view('datafashotel');
});
