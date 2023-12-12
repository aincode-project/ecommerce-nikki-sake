<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataBarangs = Barang::all();

        return view('backend.barang.index', compact('dataBarangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataJenisBarangs = JenisBarang::all();

        return view('backend.barang.create', compact('dataJenisBarangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_barang = $request->file('image_barang')->store('foto_barang');

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'jenis_barang_id' => $request->jenis_barang_id,
            'harga_barang' => $request->harga_barang,
            'stok_barang' => $request->stok_barang,
            'image_barang' => $image_barang
        ]);

        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $dataJenisBarangs = JenisBarang::all();

        return view('backend.barang.edit', compact('barang', 'dataJenisBarangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        if ($request->file('image_barang')) {
            Storage::delete($request->oldFotoBarang);
            $image_barang = $request->file('image_barang')->store('image_barang');
        } else {
            $image_barang = $request->oldFotoBarang;
        }

        Barang::where('id', $barang->id)->update([
            'nama_barang' => $request->nama_barang,
            'jenis_barang_id' => $request->jenis_barang_id,
            'harga_barang' => $request->harga_barang,
            'stok_barang' => $request->stok_barang,
            'image_barang' => $image_barang,
        ]);

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
