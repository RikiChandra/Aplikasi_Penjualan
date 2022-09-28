@extends('layout/master')
@section('title', 'Add Kategori')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kategori.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Kategori Product</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
