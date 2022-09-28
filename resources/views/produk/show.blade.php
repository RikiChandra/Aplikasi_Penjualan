@extends('layout/master')
@section('title', 'Show Product')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th colspan="3" bgcolor="yellow">Produk Unggulan</th>
                </tr>
                <tr>
                    <td rowspan="4">
                        <img src="{{ asset('storage/' . $produk->foto) }}" width="200" />
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $produk->nama }}</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>{{ $produk->harga }}</td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        {{ $produk->kategori->nama_kategori }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
