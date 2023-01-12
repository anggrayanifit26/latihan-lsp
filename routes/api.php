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

Route::get('pesan', [App\Http\Controllers\Api\PesanApiController::class, 'index']);
Route::post('pesan', [App\Http\Controllers\Api\PesanApiController::class, 'store']);
Route::post('pesan/update/{id}', [App\Http\Controllers\Api\PesanApiController::class, 'update']);
// Route::post('kategori', [App\Http\Controllers\Api\KategoriApiController::class, 'store']);
Route::get('kategori', [App\Http\Controllers\Api\ApiKategoriController::class, 'index']);
Route::delete('kategori/delete/{id}', [App\Http\Controllers\Api\KategoriApiController::class, 'destroy']);
Route::delete('pesan/delete/{id}', [App\Http\Controllers\Api\PesanApiController::class, 'destroy']);