<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('produk.index', [
            'product' => Produk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('produk.create', [
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nama' => 'required',
            'foto' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'stock' => 'required',
        ]);

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('product-images');
        }

        Produk::create($validatedData);

        return redirect('produk')->with('success', 'Berhasil tambah produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('produk.show', [
            'produk' => Produk::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
        return view('produk.edit', [
            'produk' => $produk,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
        $validatedData = $request->validate([
            'nama' => 'required',
            'foto' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'stock' => 'required',
        ]);

        if ($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['foto'] = $request->file('foto')->store('product-images');
        }

        Produk::where('id', $produk->id)->update($validatedData);

        return redirect('produk')->with('success', 'Berhasil update product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
        if ($produk->foto) {
            Storage::delete($produk->foto);
        }

        Produk::destroy($produk->id);

        return redirect('produk')->with('success', 'Berhasil hapus data');
    }
}
