<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJenisBarangRequest;
use App\Http\Requests\UpdateJenisBarangRequest;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataJenisBarangs = JenisBarang::all();

        return view('backend.jenis_barang.index', compact('dataJenisBarangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.jenis_barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJenisBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        JenisBarang::create([
            'nama_jenis' => $request->nama_jenis,
        ]);

        return redirect()->route('jenis-barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function show(JenisBarang $jenisBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisBarang $jenisBarang)
    {
        return view('backend.jenis_barang.edit', compact('jenisBarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisBarangRequest  $request
     * @param  \App\Models\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisBarang $jenisBarang)
    {
        JenisBarang::where('id', $jenisBarang->id)->update([
            'nama_jenis' => $request->nama_jenis,
        ]);

        return redirect()->route('jenis-barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisBarang $jenisBarang)
    {
        //
    }
}
