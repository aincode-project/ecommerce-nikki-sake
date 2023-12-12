<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        $dataJenisBarangs = JenisBarang::all();
        $dataKeranjangs = Keranjang::where('customer_id', Auth::user()->customer->id)->get();

        foreach ($dataKeranjangs as $key => $value) {
            if ($value->jumlah > $value->barang->stok_barang) {
                $value->update([
                    'jumlah' => $value->barang->stok_barang,
                ]);
            }
        }

        $dataKeranjangs = Keranjang::where('customer_id', Auth::user()->customer->id)->get();
        $totalKeranjang = 0;
        foreach ($dataKeranjangs as $key => $value) {
            if ($value->jumlah <= $value->barang->stok_barang) {
                $totalKeranjang = $totalKeranjang + ($value->barang->harga_barang * $value->jumlah);
            }
        }

        return view('frontend.keranjang.index', compact('dataJenisBarangs', 'dataKeranjangs', 'totalKeranjang'));
    }

    public function store(Request $request)
    {
        $dataKeranjang = Keranjang::where('customer_id', Auth::user()->customer->id)->get();
        // dd($dataKeranjang->where('barang_id', $request->barang_id));
        if ( $dataKeranjang->where('barang_id', $request->barang_id)->first() != null) {
            $jumlahLama = $dataKeranjang->where('barang_id', $request->barang_id)->first();

            Keranjang::where('id', $jumlahLama->id)->update([
                'jumlah' => $jumlahLama->jumlah + $request->jumlah,
            ]);
        } else {
            Keranjang::create([
                'barang_id' => $request->barang_id,
                'customer_id' => $request->customer_id,
                'jumlah' => $request->jumlah,
            ]);
        }

        return redirect()->route('home-user.index', 0);
    }

    public function destroy($id)
    {
        Keranjang::where('id', $id)->delete();

        return redirect()->route('keranjang.index');
    }

    public function destroyAll($id)
    {
        Keranjang::where('customer_id', $id)->delete();

        return redirect()->route('keranjang.index');
    }

    public function updateJumlah(Request $request, $id)
    {
        Keranjang::where('id', $id)->update([
            'jumlah' => $request->jumlahBaru,
        ]);

        return redirect()->route('keranjang.index');
    }
}
