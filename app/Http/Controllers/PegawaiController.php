<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pegawai.index', [
            'pegawai' => Pegawai::all()
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
        return view('pegawai.create', [
            'jabatan' => Jabatan::all()
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
            'jabatan_id' => 'required',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
            'gambar' => 'image',
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('pegawai-images');
        }

        Pegawai::create($validatedData);

        return redirect('pegawai')->with('success', 'Berhasil tambah pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('pegawai.show', [
            'pegawai' => Pegawai::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
        return view('pegawai.edit', [
            'jabatan' => Jabatan::all(),
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
        $validatedData = $request->validate([
            'nama' => 'required',
            'jabatan_id' => 'required',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
            'gambar' => 'image',
        ]);

        if ($request->file('gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('pegawai-images');
        }

        Pegawai::where('id', $pegawai->id)->update($validatedData);

        return redirect('pegawai')->with('success', 'Berhasil update data pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        //
        if ($pegawai->gambar) {
            Storage::delete($pegawai->gambar);
        }

        Pegawai::destroy($pegawai->id);

        return redirect('pegawai')->with('success', 'Berhasil Hapus data pegawai');
    }
}
