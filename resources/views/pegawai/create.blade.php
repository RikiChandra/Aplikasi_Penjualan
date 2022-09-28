@extends('layout/master')
@section('title', 'Add Pegawai')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pegawai.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pegawai</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="nama_jabatan" class="form-label">Jabatan</label>
                    <select class="form-select" aria-label="Default select example" name="jabatan_id">
                        @foreach ($jabatan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_jabatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" aria-label="Default select example" name="gender">
                        <option selected>Pilih</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                </div>
                <div class="mb-3">
                    <label for="umur" class="form-label">Umur</label>
                    <input type="text" class="form-control" id="umur" name="umur">
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No telpon</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option selected>Pilih</option>
                        <option value="Active">Active</option>
                        <option value="Non Active">Non Active</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload foto</label>
                    <input class="form-control" type="file" id="formFile" name="gambar">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
