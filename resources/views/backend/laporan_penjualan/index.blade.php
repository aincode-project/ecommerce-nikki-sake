@extends('backend.backend_layout.admin')

@section('backend')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Laporan Penjualan</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Laporan</a></li>
                    <li class="breadcrumb-item active">Laporan Penjualan</li>
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
                <div class="text-end">
                    <a href="{{ route('laporan-penjualan.print') }}" class="btn btn-outline-primary btn-sm mb-4">Cetak Laporan</a>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Customer</th>
                            <th>Total Transaksi</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                    </thead>


                    <tbody>
                    @foreach ($dataTransaksis as $dataTransaksi)
                        <tr>
                            <td>{{ Carbon\Carbon::parse($dataTransaksi->tanggal_transaksi)->format('d F Y') }}</td>
                            <td>{{ $dataTransaksi->customer->nama_customer }}</td>
                            <td class="text-end">@currency($dataTransaksi->total_transaksi)</td>
                            <td>{{ $dataTransaksi->status_transaksi }}</td>
                            <td>
                                <a href="{{ route('laporan-penjualan.show', $dataTransaksi->id) }}" class="btn btn-sm btn-outline-primary">Views</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
