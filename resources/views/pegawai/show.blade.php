@extends('layout/master')
@section('title', 'View Pegawai')
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/' . $pegawai->gambar) }}"
                    height="200px" alt="User profile picture">
            </div>
            <h3 class="profile-username text-center">{{ $pegawai->nama }}</h3>
            <p class="text-muted text-center">{{ $pegawai->status }}</p>
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Jabatan</b> <a class="float-right">{{ $pegawai->jabatan->nama_jabatan }}</a>
                </li>
                <li class="list-group-item">
                    <b>Jenis Kelamin</b> <a class="float-right">{{ $pegawai->gender }}</a>
                </li>
                <li class="list-group-item">
                    <b>Umur</b> <a class="float-right">{{ $pegawai->umur }}</a>
                </li>
            </ul>
            <a href="/pegawai" class="btn btn-primary btn-block"><b>Kembali</b></a>
        </div>

    </div>
@endsection
