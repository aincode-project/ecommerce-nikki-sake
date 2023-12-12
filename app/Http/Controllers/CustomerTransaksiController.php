<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerTransaksiController extends Controller
{
    public function index()
    {
        $dataTransaksis = Transaksi::all();

        return view('frontend.transaksi.index', compact('dataTransaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        return view('frontend.transaksi.show', compact('transaksi'));
    }

    public function uploadBuktiTransfer(Request $request, $id)
    {
        $bukti_transfer = $request->file('bukti_transfer')->store('bukti_transfer');

        Transaksi::where('id', $id)->update([
            'status_transaksi' => 'Menunggu Konfirmasi Pembayaran',
            'bukti_transfer' => $bukti_transfer,
        ]);

        return redirect()->back();
    }

    public function ubahBuktiTransfer(Request $request, $id)
    {
        if ($request->file('bukti_transfer')) {
            Storage::delete($request->oldBuktiTransfer);
            $bukti_transfer = $request->file('bukti_transfer')->store('bukti_transfer');
        } else {
            $bukti_transfer = $request->oldBuktiTransfer;
        }

        Transaksi::where('id', $id)->update([
            'bukti_transfer' => $bukti_transfer,
        ]);

        return redirect()->back();
    }
}
