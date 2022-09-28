@extends('layout/master')
@section('title', 'daftar pegawai')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5><a href="/pegawai/create" class="btn btn-primary">Tambah</a></h5>
            <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama pegawai</th>
                        <th>Jabatan</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>No Telpn</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php $no = 1; ?>
                <tbody>
                    @foreach ($pegawai as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jabatan->nama_jabatan }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->tgl_lahir }}</td>
                            <td>{{ $item->umur }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="/pegawai/{{ $item->id }}" class="btn btn-info">View</a>
                                <a href="/pegawai/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                <form action="/pegawai/{{ $item->id }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah anda ingin menghapus?')">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
