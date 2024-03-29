@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                @include('components.user.sidebar')
            </div>
            
            <div class="col-10">
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
                <form action="{{ route('user.profil.update') }}" method="POST" enctype="multipart/form-data">
                    @CSRF
                    @METHOD('PUT')
                    <table class="table-striped table-bordered">
                        <tr>
                            <th>Foto</th>
                            <td><input type="file" class="form-control" name="foto"></td>
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
</div>
</div>
@endsection
