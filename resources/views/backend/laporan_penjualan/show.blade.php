@extends('backend.backend_layout.admin')

@section('backend')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Detail Penjualan</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Laporan</a></li>
                    <li class="breadcrumb-item active">Laporan Penjualan</li>
                    <li class="breadcrumb-item active">Detail Penjualan</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>Detail Penerima:</strong><br>
                                    {{ $transaksi->nama_penerima }}<br>
                                    {{ $transaksi->no_telp }}<br>
                                    {{ $transaksi->alamat }}<br>
                                </address>
                            </div>
                            <div class="col-6 text-end">
                                <address>
                                    <strong>Detail Pengiriman:</strong><br>
                                    {{ $transaksi->kurir }}<br>
                                    {{ $transaksi->no_resi }}<br>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mt-4">
                                <address>
                                    <strong>Tanggal Transaksi:</strong><br>
                                    {{ $transaksi->tanggal_transaksi }}<br><br>
                                </address>
                            </div>
                            {{-- <div class="col-6 text-end">
                                <address>
                                    <a href="{{ route('laporan-penjualan.print-invoice', $transaksi->id) }}" class="btn btn-outline-primary btn-sm mb-4">Cetak Laporan</a>
                                </address>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div>
                            <div class="p-2">
                                <h3 class="font-size-16"><strong>Ringkasan Pesanan</strong></h3>
                            </div>
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td><strong>Barang</strong></td>
                                            <td class="text-center"><strong>Harga</strong></td>
                                            <td class="text-center"><strong>Jumlah</strong>
                                            </td>
                                            <td class="text-end"><strong>Totals</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($transaksi->detail_transaksi as $detail_transaksi)
                                        <tr>
                                            <td>{{ $detail_transaksi->barang->nama_barang }}</td>
                                            <td class="text-center">@currency($detail_transaksi->harga_barang)</td>
                                            <td class="text-center">{{ $detail_transaksi->jumlah }}</td>
                                            <td class="text-end">@currency($detail_transaksi->harga_barang * $detail_transaksi->jumlah)</td>
                                        </tr>
                                        @endforeach

                                        <tr>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line text-center">
                                                <strong>Subtotal</strong></td>
                                            <td class="thick-line text-end">@currency($transaksi->subtotal)</td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center">
                                                <strong>Biaya Kirim</strong></td>
                                            <td class="no-line text-end">@currency($transaksi->biaya_pengiriman)</td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center">
                                                <strong>Total</strong></td>
                                            <td class="no-line text-end"><h4 class="m-0">@currency($transaksi->total_transaksi)</h4></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-print-none">
                                    <div class="float-end">
                                        {{-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a> --}}
                                        @if ($transaksi->status_transaksi == "Diproses")
                                        <a href="#" class="btn btn-primary waves-effect waves-light ms-2" data-bs-toggle="modal" data-bs-target="#prosesModal">Proses</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="prosesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="prosesModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form class="form-horizontal mt-3" method="POST" action="{{ route('pengiriman.send', $transaksi->id) }}">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="prosesModalLabel">Proses Kirim</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group mb-3 row">
                                                                <div class="col-12">
                                                                    <input id="kurir" type="text" class="form-control @error('kurir') is-invalid @enderror" name="kurir" value="{{ old('kurir') }}" required autocomplete="kurir" autofocus placeholder="Jasa Ekspedisi">

                                                                    @error('kurir')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3 row">
                                                                <div class="col-12">
                                                                    <input id="no_resi" type="text" class="form-control @error('no_resi') is-invalid @enderror" name="no_resi" value="{{ old('no_resi') }}" required autocomplete="no_resi" autofocus placeholder="No Resi">

                                                                    @error('no_resi')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</a>
                                                            {{-- <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button> --}}
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Kirim</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> <!-- end row -->

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
