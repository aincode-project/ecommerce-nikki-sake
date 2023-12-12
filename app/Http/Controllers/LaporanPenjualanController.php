<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    public function index()
    {
        $dataTransaksis = Transaksi::where('status_transaksi', 'Selesai')->get();

        return view('backend.laporan_penjualan.index', compact('dataTransaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();

        return view('backend.laporan_penjualan.show', compact('transaksi'));
    }

    public function print()
    {
        $dataTransaksis = Transaksi::where('status_transaksi', 'Selesai')->get();

        // $pdf = PDF::make();
        $pdf = PDF::loadView('backend.laporan_penjualan.print', compact('dataTransaksis'));

        return $pdf->stream('laporan-penjualan_' . now()->format('Y-m-d') . '.pdf');
    }

    public function printInvoice($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();

        // $pdf = PDF::make();
        $pdf = PDF::loadView('backend.laporan_penjualan.print-invoice', compact('transaksi'));

        return $pdf->stream('invoice' . $transaksi->tanggal_transaksi . '.pdf');
    }
}
