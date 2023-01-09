@extends('layouts.app')
@section('content')
    <div class="container">
        @include('components.user.sidebar')

        <div class="row">
            <div class="col">
                <h2>Buku yang Sedang Dipinjam</h2>
            </div>
            <div class="row">
                <div class="text-end">
                    <a href="{{ route('user.form_peminjaman_dashboard') }}" class="btn btn-primary">Pinjam Buku</a>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul Buku</th>
                    <th>Tanggal peminjaman</th>
                    <th>Kondisi Buku</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $key => $p)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $p->buku->judul }}</td>
                        <td>{{ $p->tanggal_peminjaman }}</td>
                        <td>{{ $p->kondisi_buku_saat_dipinjam }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection