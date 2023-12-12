<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class LaporanStokBarangController extends Controller
{
    public function index()
    {
        $dataBarangs = Barang::all();

        return view('backend.laporan_stok_barang.index', compact('dataBarangs'));
    }

    public function print()
    {
        $dataBarangs = Barang::all();

        // $pdf = PDF::make();
        $pdf = PDF::loadView('backend.laporan_stok_barang.print', compact('dataBarangs'));

        return $pdf->stream('laporan-stok_' . now()->format('Y-m-d') . '.pdf');
    }
}
