<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\DetailTransaksi;
use App\Models\JenisBarang;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $dataJenisBarangs = JenisBarang::all();
        $dataCustomer = Customer::where('id', Auth::user()->customer->id)->first();

        $dataKeranjangs = Keranjang::where('customer_id', Auth::user()->customer->id)->get();
        $totalProduk = Keranjang::where('customer_id', Auth::user()->customer->id)->count();
        $subtotal = 0;
        foreach ($dataKeranjangs as $key => $value) {
            if ($value->jumlah <= $value->barang->stok_barang) {
                $subtotal = $subtotal + ($value->barang->harga_barang * $value->jumlah);
            }
        }

        return view('frontend.checkout.index', compact('dataJenisBarangs', 'subtotal', 'totalProduk', 'dataCustomer'));
    }

    public function checkout(Request $request)
    {
        $dataTransaksi = Transaksi::create([
           'customer_id' => Auth::user()->customer->id,
           'nama_penerima' => Auth::user()->customer->nama_customer,
           'alamat' => Auth::user()->customer->alamat,
           'no_telp' => Auth::user()->customer->no_telp,
           'subtotal' => $request->subtotal,
           'biaya_pengiriman' => 30000,
           'total_transaksi' => $request->subtotal + 30000,
           'status_transaksi' => "Belum Bayar"
        ]);

        $dataKeranjangs = Keranjang::where('customer_id', Auth::user()->customer->id)->get();
        foreach ($dataKeranjangs as $key => $value) {
            DetailTransaksi::create([
                'transaksi_id' => $dataTransaksi->id,
                'barang_id' => $value->barang_id,
                'harga_barang' => $value->barang->harga_barang,
                'jumlah' => $value->jumlah
            ]);

            $dataBarang = Barang::where('id', $value->barang_id)->first();
            Barang::where('id', $value->barang_id)->update([
                'stok_barang' => $dataBarang->stok_barang - $value->jumlah,
                'jumlah_terjual' => $dataBarang->jumlah_terjual + $value->jumlah
            ]);
        }

        Keranjang::where('customer_id', Auth::user()->customer->id)->delete();

        return redirect()->route('transaksi-customer.index');
    }
}
