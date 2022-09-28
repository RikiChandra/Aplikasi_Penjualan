@extends('layout/master')
@section('title', 'daftar jabatan')
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
            <h5><a href="/jabatan/create" class="btn btn-primary">Tambah</a></h5>
            <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php $no = 1; ?>
                <tbody>
                    @foreach ($jabatan as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama_jabatan }}</td>
                            <td>
                                <a href="/jabatan/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                <form action="/jabatan/{{ $item->id }}" method="POST" class="d-inline">
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
