@extends('layouts.app')

@section('content')
    <div class="container">
        @include('components.user.sidebar')

        @if (session('status'))
            <div class="alert alert-{{ session('status') }}">
                {{ session('message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Update Profile</h4>
            </div>
            <div class="card-body">
                @foreach ($users as $b)
                <form action="{{ route('user.profil.update') }}" method="POST" enctype="multipart/form-data">
                    @CSRF
                    @METHOD('PUT')
                    <table class="table-striped table-bordered">
                        <tr>
                            <th>Foto</th>
                            <td><input type="file" class="form-control" name="foto">    <img src="{{ url('/img' . '/' . $b->foto) }}" style="height: 150px;object-fit: cover;"
                                class="card-img" alt="...."></td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td><input type="text" class="form-control" name="full_name"
                                    value="{{ Auth::user()->full_name }}"></td>
                        </tr>
                        <tr>
                            <th>NIS</th>
                            <td><input type="text" class="form-control" name="nis" value="{{ Auth::user()->nis }}">
                            </td>
                            <input type="hidden" class="form-control" name="kode" value="{{ Auth::user()->kode }}">
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><input type="text" class="form-control" name="alamat"
                                    value="{{ Auth::user()->alamat }}"></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td><input type="text" class="form-control" name="username"
                                value="{{ Auth::user()->username }}"></td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td><input type="text" class="form-control" name="password"
                                    placeholder="Sandi tidak berubah"></td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td><input type="text" class="form-control" name="kelas" value="{{ Auth::user()->kelas }}">
                            </td>
                        </tr>
                        <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </table>
</div>
</form>
@endforeach
@endsection
