@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                @include('components.user.sidebar')
            </div>
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Peminjaman</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.submit_peminjaman') }}" class="form-group" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" name="tanggal_peminjaman">
                            </div>
                            <div class="mb-3">
                                <label for="">Pilih Buku</label>
                                <select class="form-select" name="buku_id">
                                    <option value="" disabled selected>--Pilih Opsi--</option>
                                    @foreach ($buku as $b)
                                        {{-- @dd($buku) --}}
                                        <option value="{{ $b->id }}"
                                            {{ isset($buku_id) ? ($buku_id == $b->id ? 'selected' : '') : '' }}>
                                            {{ $b->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Kondisi Buku</label>
                                <select class="form_select" name="kondisi_buku_saat_dipinjam">
                                    <option value="baik">Baik</option>
                                    <option value="rusak">Rusak</option>
                                </select>
                            </div>
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
