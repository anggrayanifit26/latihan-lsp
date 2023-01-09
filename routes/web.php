<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->group(function() {
    Route::get('/dashboard', function(){
        $pemberitahuan = Pemberitahuan::where('status', 'aktif')->get();
        $buku = Buku::all();
        
        return view('user.dashboard', compact('pemberitahuan', 'buku'));
    })->name('user.dashboard');

    
    Route::post('/form_peminjaman', function(Request $request){
        $buku_id = $request->buku_id;
        $buku = Buku::all();
        return view('user.form_peminjaman', compact('buku','buku_id'));
    })->name('user.form_peminjaman_dashboard');

    Route::get('/peminjaman', function(){
        $peminjaman = Peminjaman::where('user_id', Auth::user()->id)->get();
        return view('user.peminjaman', compact('peminjaman'));
    })->name('user.peminjaman');

    Route::get('/pengembalian', function(){
        return view('user.pengembalian');
    })->name('user.pengembalian');

    Route::get('/pesan', function(){
        return view('user.pesan');
    })->name('user.pesan');

    Route::get('/profil', function(){
        return view('user.profil');
    })->name('user.profil');

    Route::put('/profil', function(Request $request){
        $id = Auth::user()->id;
        // $foto = $request->file("foto");
        // $path = $foto->store('public/img');
        // $namaGambar = basename($path);

        $user = User::find(Auth::user()->id)->update($request->all());
        $user2 = User::find(Auth::user()->id)->update([
            "password" => Hash::make($request->password),
            // "foto" => $namaGambar
        ]);
            if($user && $user2 ){
                return redirect()->back()->with("status", "success")->with ("message","Berhasil mengupdate Profil");
            }
            return redirect()->back()->with("status","danger")->with("message", "Gagal mengupdate Profil");
    })->name('user.profil.update');


    Route::post('submit_peminjaman', function(Request $request){
        $tanggal_peminjaman = $request->tanggal_peminjaman;
        $buku_id = $request->buku_id;
        $kondisi_buku_saat_dipinjam = $request->kondisi_buku_saat_dipinjam;
        $user_id = $request->user_id;

        $peminjaman = Peminjaman::create([
            "tanggal_peminjaman" => $tanggal_peminjaman,
            "buku_id" => $buku_id,
            "kondisi_buku_saat_dipinjam" => $kondisi_buku_saat_dipinjam,
            "user_id" => $user_id
        ]);
        if($peminjaman){
            return redirect()->route("user.peminjaman");
        }
        return redirect()->back();
        
    })->name('user.submit_peminjaman');

Route::prefix('admin')->group(function() {
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

});