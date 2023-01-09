<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Identitas;
use App\Models\Kategori;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Database\Seeder;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'kode' => 'A1',
            'full_name' => 'admin',
            'nis' => null,
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'kelas' => null,
            'alamat' => 'jl.asd',
            'verif' => 'vefiried',
            'role' => 'admin',
            'join_date' => '2023-06-01',
            'terakhir_login' => '2023-06-01',
            'foto' => null
        ]);

        User::create([
            'kode' => 'A2',
            'full_name' => 'User',
            'nis' => '12345',
            'username' => 'user1',
            'password' => bcrypt('user'),
            'kelas' => 'XII-RPL',
            'alamat' => 'jl.asdasd',
            'verif' => 'verified',
            'role' => 'user',
            'join_date' => '2023-06-02',
            'terakhir_login' => '2023-06-02',
            'foto' => ''
        ]);

        User::create([
            'kode' => 'A3',
            'full_name' => 'User',
            'nis' => '12346',
            'username' => 'user2',
            'password' => bcrypt('user'),
            'kelas' => 'XII-BDP',
            'alamat' => 'jl.asdasd',
            'verif' => 'verified',
            'role' => 'user',
            'join_date' => '2023-06-02',
            'terakhir_login' => '2023-06-02',
            'foto' => ''
        ]);

        Kategori::create([
            'kode' => 'B1',
            'nama' => 'Umum',
        ]);

        Kategori::create([
            'kode' => 'B2',
            'nama' => 'Sains',
        ]);

        Kategori::create([
            'kode' => 'B3',
            'nama' => 'Sejarah',
        ]);

        Penerbit::create([
            'kode' => 'P1',
            'nama' => 'Erlangga',
            'verif' => 'verified',
        ]);

        Penerbit::create([
            'kode' => 'P2',
            'nama' => 'BSE',
            'verif' => 'verified',
        ]);

        Penerbit::create([
            'kode' => 'P3',
            'nama' => 'KKPK',
            'verif' => 'verified',
        ]);

        Buku::create([
            'judul' => 'Cara Memasak Nasi',
            'kategori_id' => '1',
            'penerbit_id' => '2',
            'pengarang' => 'PHP',
            'tahun_terbit' => '2012',
            'isbn' => null,
            'j_buku_baik' => '20',
            'j_buku_rusak' => '12',
        ]);

        Buku::create([
            'judul' => 'Melihat Galaksi Bima Sakti',
            'kategori_id' => '2',
            'penerbit_id' => '3',
            'pengarang' => 'Bobo',
            'tahun_terbit' => '2011',
            'isbn' => '123142134',
            'j_buku_baik' => '20',
            'j_buku_rusak' => '12',
        ]);

        Buku::create([
            'judul' => 'Sejarah Borobudur',
            'kategori_id' => '3',
            'penerbit_id' => '1',
            'pengarang' => 'NN',
            'tahun_terbit' => '2004',
            'isbn' => '21453116',
            'j_buku_baik' => '20',
            'j_buku_rusak' => '12',
        ]);

        Peminjaman::create([
            'user_id' => '2',
            'buku_id' => '2',
            'tanggal_peminjaman' => '2023-06-01',
            'tanggal_pengembalian' => '2023-06-01',
            'kondisi_buku_saat_dipinjam' => 'baik',
            'denda' => '100000',
        ]);

        Peminjaman::create([
            'user_id' => '3',
            'buku_id' => '3',
            'tanggal_peminjaman' => '2023-06-01',
            'tanggal_pengembalian' => null,
            'kondisi_buku_saat_dipinjam' => 'baik',
            'denda' => null,
        ]);

        Peminjaman::create([
            'user_id' => '3',
            'buku_id' => '1',
            'tanggal_peminjaman' => '2023-06-01',
            'tanggal_pengembalian' => null,
            'kondisi_buku_saat_dipinjam' => 'baik',
            'denda' => null,
        ]);

        Pemberitahuan::create([
            'isi' => 'Mohon Maaf',
            'level_user' => null,
            'status' => 'nonaktif',

        ]);

        Pemberitahuan::create([
            'isi' => 'tidak buka',
            'level_user' => null,
            'status' => 'nonaktif',

        ]);
        
        Pemberitahuan::create([
            'isi' => 'Melayani pengembalian buku',
            'level_user' => null,
            'status' => 'aktif',

        ]);

        Pesan::create([
            'penerima_id' => '2',
            'pengirim_id' => '1',
            'judul' => 'Buku dipinjam',
            'isi' => 'Buku sedang dipinjam, harap mengermbalikan sebelum 30 hari',
            'status' => 'terkirim',
            'tanggal_kirim' => '2021-06-01',
            
        ]);
        
        Pesan::create([
            'penerima_id' => '3',
            'pengirim_id' => '1',
            'judul' => 'Anda Merusakkan buku',
            'isi' => 'Anda terkena denda 100000',
            'status' => 'terkirim',
            'tanggal_kirim' => '2023-06-01',

        ]);

        Pesan::create([
            'penerima_id' => '2',
            'pengirim_id' => '1',
            'judul' => 'Buku telah dikembalikan',
            'isi' => 'Terimakasih telah meminjam buku di perpustakaan',
            'status' => 'dibaca',
            'tanggal_kirim' => '2023-06-01',

        ]);

        Identitas::create([
            'nama_app' => 'PERPUS SMKN 10 JAKARTA',
            'alamat_app' => 'JL.SMEAN 6, Cawang, Kramat Jati, Jakarta Timut',
            'email_app' => 'email@smkn10jakarta.sch.id',
            'nomor_hp' => '081234567890',
    
        ]);
        
    }
}
