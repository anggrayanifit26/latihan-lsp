<?php

use App\Models\Buku;
use App\Models\Pemberitahuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('user', [App\Http\Controllers\API\UserController::class, 'index']);

//Pesan
Route::get('pesan', [App\Http\Controllers\Api\ApiPesanController::class, 'index']);
Route::post('pesan/add', [App\Http\Controllers\Api\ApiPesanController::class, 'store']);
Route::post('pesan/update/{id}', [App\Http\Controllers\Api\ApiPesanController::class, 'update']);
Route::delete('pesan/delete/{id}', [App\Http\Controllers\Api\ApiPesanController::class, 'destroy']);

//Kategori
Route::get('kategori', [App\Http\Controllers\Api\ApiKategoriController::class, 'index']);
Route::post('kategori/add', [App\Http\Controllers\Api\ApiKategoriController::class, 'store']);
Route::post('kategori/update/{id}', [App\Http\Controllers\Api\ApiKategoriController::class, 'update']);
Route::delete('kategori/delete/{id}', [App\Http\Controllers\Api\KategoriApiController::class, 'destroy']);

//Buku
Route::get('buku', [App\Http\Controllers\Api\ApiBukuController::class, 'index']);
Route::post('buku/add', [App\Http\Controllers\Api\ApiBukuController::class, 'store']);
Route::post('buku/update/{id}', [App\Http\Controllers\Api\ApiBukuController::class, 'update']);
Route::delete('buku/delete/{id}', [App\Http\Controllers\Api\ApiBukuController::class, 'destroy']);

//Identitas
Route::get('identitas', [App\Http\Controllers\Api\ApiIdentitasController::class, 'index']);
Route::post('identitas/update/{id}', [App\Http\Controllers\Api\ApiIdentitasController::class, 'update']);

//Pemberitahuan

//Peminjaman

//Penerbit

