@extends('backend.backend_layout.admin')

@section('backend')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Validasi Pembayaran</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Data Transaksi</a></li>
                    <li class="breadcrumb-item active">Validasi Pembayaran</li>
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
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Customer</th>
                            <th>Total Transaksi</th>
                            <th>Status</th>
                            <th>Bukti Transfer</th>
                        </tr>
                    </thead>


                    <tbody>
                    @foreach ($dataTransaksis as $dataTransaksi)
                        <tr>
                            <td>{{ $dataTransaksi->tanggal_transaksi }}</td>
                            <td>{{ $dataTransaksi->customer->nama_customer }}</td>
                            <td class="text-end">@currency($dataTransaksi->total_transaksi)</td>
                            <td>{{ $dataTransaksi->status_transaksi }}</td>
                            <td>
                                @if ($dataTransaksi->bukti_transfer != null)
                                <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#validasiModal{{ $dataTransaksi->id }}">Validasi</button>
                                <!-- Modal -->
                                <div class="modal fade" id="validasiModal{{ $dataTransaksi->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="validasiModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form class="form-horizontal mt-3" method="POST" action="{{ route('validasi-pembayaran.validasi', $dataTransaksi->id) }}" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="validasiModalLabel">Validasi Pembayaran</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="wsus__invoice_footer">
                                                        <p><span>Total Transaksi:</span> @currency($dataTransaksi->total_transaksi) </p>
                                                        <div class="form-group mt-3 row">
                                                            <div class="col-12">
                                                                <label for="bukti_transfer"><span>Bukti Transfer</span></label>
                                                                <img src="{{ asset('storage/' . $dataTransaksi->bukti_transfer) }}" class="img-preview-ubah img-fluid mb-3 col-sm-9 d-block">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</a>
                                                    {{-- <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button> --}}
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Validasi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
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
