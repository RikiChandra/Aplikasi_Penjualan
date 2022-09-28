@extends('layout/master')
@section('title', 'Product')
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
            <h5><a href="/produk/create" class="btn btn-primary">Tambah</a></h5>
            <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Product</th>
                        <th>Kategori Product</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php $no = 1; ?>
                <tbody>
                    @foreach ($product as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>
                                <a href="/produk/{{ $item->id }}" class="btn btn-info">VIEW</a>
                                <a href="/produk/{{ $item->id }}/edit" class="btn btn-warning">EDIT</a>
                                <form action="/produk/{{ $item->id }}" method="POST" class="d-inline">
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
