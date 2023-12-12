<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidasiPembayaranController extends Controller
{
    public function index()
    {
        $dataTransaksis = Transaksi::where('status_transaksi', 'Belum Bayar')->orWhere('status_transaksi', 'Menunggu Konfirmasi Pembayaran')->get();

        return view('backend.validasi_pembayaran.index', compact('dataTransaksis'));
    }

    public function validasi($id)
    {
        Transaksi::where('id', $id)->update([
            'user_id' => Auth::user()->id,
            'status_transaksi' => 'Diproses'
        ]);

        return redirect()->back();
    }
}
