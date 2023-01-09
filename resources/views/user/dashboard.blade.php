@extends('layouts.app')
@section('content')
<div class="container">
    @include('components.user.sidebar')

    @foreach ($pemberitahuan as $p)
        <div class="alert alert-info">
            {{ $p->isi }}
        </div>
    @endforeach

    <div class="row">
        @foreach ($buku as $b)
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        {{ $b->kategori->nama }}
                    </div>
                    <div class="card-body">
                        <div><b>Nama Buku:</b> {{ $b->judul }}</div>
                        <div><b>Penerbit:</b> {{ $b->penerbit->nama}}</div>
                        <div><b>Pengarang:</b> {{ $b->pengarang }}</div>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('user.form_peminjaman_dashboard') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $b->id }}" name="buku_id">
                            <button type="submit" class="btn btn-primary">Pinjam</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection 