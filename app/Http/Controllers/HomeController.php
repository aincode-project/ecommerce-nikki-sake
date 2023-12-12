<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->hak_akses == 3) {
            return redirect()->route('home-user.index', 0);
        } else {
            $total_penjualan = Transaksi::where('status_transaksi', 'Selesai')->sum('total_transaksi');
            $jumlah_customer = Customer::all()->count();
            $total_barang_terjual = Barang::all()->sum('jumlah_terjual');

            $tahun = Transaksi::select(DB::raw("YEAR(tanggal_transaksi) as tahun"))
                ->GroupBy(DB::raw("YEAR(tanggal_transaksi)"))
                ->pluck('tahun');

            $jumlah_terjual = Barang::select(DB::raw("CAST(SUM(jumlah_terjual) as int) as jumlah_terjual"))
                // ->take(2)
                ->where('jumlah_terjual', '>', 0)
                ->GroupBy(DB::raw("nama_barang"))
                ->pluck('jumlah_terjual');

            $nama_barang = Barang::select(DB::raw("nama_barang"))
                // ->take(2)
                ->where('jumlah_terjual', '>', 0)
                ->GroupBy(DB::raw("nama_barang"))
                ->pluck('nama_barang');

            return view('home', compact('total_penjualan', 'jumlah_customer', 'total_barang_terjual', 'tahun', 'jumlah_terjual', 'nama_barang'));
        }
    }

    public function getMonthlySalesData(Request $request) {
        $year = $request->input('year'); // Ambil tahun dari request

        // Query database untuk mengambil data penjualan berdasarkan tahun
        $salesData = DB::table('transaksis')
            ->select(
                DB::raw('MONTH(tanggal_transaksi) as month'),
                DB::raw('CAST(SUM(total_transaksi) as int) as total_sales')
            )
            ->where('status_transaksi', 'Selesai')
            ->whereYear('tanggal_transaksi', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $data = [];

        // Buat label bulan dan data total penjualan dari hasil query
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = date('F', mktime(0, 0, 0, $i, 1, 2000)); // Nama bulan
            $monthData = $salesData->where('month', $i)->first();
            $data[] = $monthData ? $monthData->total_sales : 0;
        }

        $response = [
            'labels' => $labels,
            'data' => $data
        ];

        return response()->json($response);
    }
}
