@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                @include('components.user.sidebar')
            </div>

            <div class="col-10">
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
                                    <img src="{{ url('/img' . '/' . $b->foto) }}" style="height: 150px;object-fit: cover;"
                                        class="card-img" alt="....">
                                </div>
                                <div class="card-body" style="min-height: 200px; max-height: 200px;">
                                    <h3 style="min-height: 28px"><b>{{ $b->judul }}</b></h3>
                                    @if ($b->kategori->nama == 'Umum')
                                        <span class="badge rounded-pill text-bg-danger">{{ $b->kategori->nama }}</span>
                                    @elseif($b->kategori->nama == 'Sains')
                                        <span class="badge rounded-pill text-bg-success">{{ $b->kategori->nama }}</span>
                                    @else($b->kategori->nama =='Sejarah')
                                        <span class="badge rounded-pill text-bg-info">{{ $b->kategori->nama }}</span>
                                    @endif
                                    <div class="row" style="padding-top:20px;">
                                        <div class="col-6" >
                                            <p class="text-start">
                                                <b>Pengarang</b><br>
                                                {{ $b->pengarang }}
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <p class="text-end">
                                                <b>Penerbit</b><br>
                                                {{ $b->penerbit->nama }}
                                            </p>
                                        </div>
                                    </div>
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
        </div>
    </div>
@endsection
