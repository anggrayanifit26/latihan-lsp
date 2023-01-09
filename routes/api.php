<?php

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

// Route::get('/index', 'KategoriController@index');
Route::prefix('user')->group(function() {
    Route::get('/dashboard', function(){
        $pemberitahuan = Pemberitahuan::where('status', 'aktif')->get();
        $buku = Buku::all();
        
        return view('user.dashboard', compact('pemberitahuan', 'buku'));
    })->name('user.dashboard');
});