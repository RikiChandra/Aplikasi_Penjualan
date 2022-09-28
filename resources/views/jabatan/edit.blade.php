@extends('layout/master')
@section('title', 'Add jabatan')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('jabatan.update', ['jabatan' => $jabatan->id]) }}" method="post">
                @method('PATCH')
                @csrf
                <div class="mb-3">
                    <label for="nama_jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan"
                        value="{{ old('nama_jabatan') ?? $jabatan->nama_jabatan }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
