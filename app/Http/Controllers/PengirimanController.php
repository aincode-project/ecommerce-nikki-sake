<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        $dataTransaksis = Transaksi::where('status_transaksi', 'Diproses')->orWhere('status_transaksi', 'Dikirim')->get();

        return view('backend.pengiriman.index', compact('dataTransaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();

        return view('backend.pengiriman.show', compact('transaksi'));
    }

    public function send(Request $request, $id)
    {
        Transaksi::where('id', $id)->update([
            'status_transaksi' => "Dikirim",
            'kurir' => $request->kurir,
            'no_resi' => $request->no_resi
        ]);

        return redirect()->route('pengiriman.index');
    }

    public function konfirmasi($id)
    {
        Transaksi::where('id', $id)->update([
            'status_transaksi' => "Selesai",
        ]);

        return redirect()->route('transaksi-customer.index');
    }
}
