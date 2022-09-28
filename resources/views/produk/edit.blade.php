@extends('layout/master')
@section('title', 'Edit Product')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('produk.update', ['produk' => $produk->id]) }}" method="post"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Product</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="{{ old('nama') ?? $produk->nama }}">
                </div>
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="kategori_id">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">harga Product</label>
                    <input type="text" class="form-control" id="harga" name="harga"
                        value="{{ old('harga') ?? $produk->harga }}">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">stock Product</label>
                    <input type="text" class="form-control" id="stock" name="stock"
                        value="{{ old('stock') ?? $produk->stock }}">
                </div>
                <input type="hidden" name="oldImage" value="{{ $produk->foto }}">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload foto</label>
                    <input class="form-control" type="file" id="formFile" name="foto">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
