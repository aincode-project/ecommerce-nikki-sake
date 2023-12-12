@extends('frontend.frontend-layout.dashboard-customer')

@section('dashboard-content')
<div class="dashboard_content">
    <h3><i class="fas fa-list-ul"></i> detail transaksi</h3>
    <div class="wsus__invoice_area">
        <div class="wsus__invoice_header">
            <div class="wsus__invoice_content">
                <div class="row">
                    <div class="col-xl-6 col-md-6 mb-5 mb-md-0">
                        <div class="wsus__invoice_single">
                            <h5>Detail Tranasksi</h5>
                            <h6>Nama: {{ $transaksi->customer->nama_customer }}</h6>
                            <p>Tanggal: {{ $transaksi->tanggal_transaksi }}</p>
                            @if ($transaksi->status_transaksi == "Dikirim" || $transaksi->status_transaksi == "Selesai")
                                <p>Kurir: {{ $transaksi->kurir }}</p>
                                <p>No Resi: {{ $transaksi->no_resi }}</p>
                            @endif
                            <p>
                                Status: {{ $transaksi->status_transaksi }}
                                @if ($transaksi->status_transaksi == "Belum Bayar")
                                    <a href="" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#bayarModal">Bayar</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="bayarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="bayarModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form class="form-horizontal mt-3" method="POST" action="{{ route('transaksi-customer.uploadBukti', $transaksi->id) }}" enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="bayarModalLabel">Pembayaran</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="wsus__invoice_footer">
                                                            <p><span>Total Transaksi:</span> @currency($transaksi->total_transaksi) </p>
                                                            <p><span>Bank: </span> BCA</p>
                                                            <p><span>No Rek: </span> 0128317210121</p>
                                                            <div class="form-group mt-3 row">
                                                                <div class="col-12">
                                                                    <label for="bukti_transfer"><span>Bukti Transfer</span></label>
                                                                    <img class="img-preview img-fluid mb-3 col-sm-3">
                                                                    <input id="bukti_transfer" type="file" class="form-control @error('bukti_transfer') is-invalid @enderror" name="bukti_transfer" value="{{ old('bukti_transfer') }}" required autocomplete="bukti_transfer" onchange="previewImage()">

                                                                    @error('bukti_transfer')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</a>
                                                        {{-- <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button> --}}
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <a href="" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#lihatBuktiModal">Lihat Bukti Transfer</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="lihatBuktiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="lihatBuktiModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="lihatBuktiModalLabel">Bukti Transfer</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="wsus__invoice_footer">
                                                        <div class="form-group row">
                                                            <div class="col-12">
                                                                <img class="img-preview img-fluid mb-3 col-sm-6" src="{{ asset('storage/' . $transaksi->bukti_transfer) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if ($transaksi->status_transaksi == "Menunggu Konfirmasi Pembayaran")
                                        <a href="" class="btn btn-sm btn-outline-warning mt-2" data-bs-toggle="modal" data-bs-target="#ubahBuktiModal">Ubah Bayar</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="ubahBuktiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="ubahBuktiModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form class="form-horizontal mt-3" method="POST" action="{{ route('transaksi-customer.ubahBukti', $transaksi->id) }}" enctype="multipart/form-data">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ubahBuktiModalLabel">Ubah Bukti Pembayaran</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="wsus__invoice_footer">
                                                                <p><span>Total Transaksi:</span> @currency($transaksi->total_transaksi) </p>
                                                                <p><span>Bank: </span> BCA</p>
                                                                <p><span>No Rek: </span> 0128317210121</p>
                                                                <div class="form-group mt-3 row">
                                                                    <div class="col-12">
                                                                        <label for="bukti_transfer"><span>Bukti Transfer</span></label>
                                                                        <input type="hidden" name="oldBuktiTransfer" value="{{ $transaksi->bukti_transfer }}">
                                                                        @if ($transaksi->bukti_transfer)
                                                                            <img src="{{ asset('storage/' . $transaksi->bukti_transfer) }}" class="img-preview-ubah img-fluid mb-3 col-sm-3 d-block">
                                                                        @else
                                                                            <img class="img-preview-ubah img-fluid mb-3 col-sm-3">
                                                                        @endif
                                                                        <input id="bukti_transfer-ubah" type="file" class="form-control @error('bukti_transfer') is-invalid @enderror" name="bukti_transfer" value="{{ old('bukti_transfer') }}" required autocomplete="bukti_transfer" onchange="previewImageUbah()">

                                                                        @error('bukti_transfer')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</a>
                                                            {{-- <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button> --}}
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                @if ($transaksi->status_transaksi == "Dikirim")
                                <form action="{{ route('pengiriman.konfirmasi', $transaksi->id) }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-primary mt-2">Konfirmasi Penerimaan</button>
                                </form>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="wsus__invoice_single text-md-end">
                            <h5>Alamat Pengiriman</h5>
                            <h6>{{ $transaksi->nama_penerima }}</h6>
                            <p>{{ $transaksi->no_telp }}</p>
                            <p>{{ $transaksi->alamat }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wsus__invoice_description">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th class="images">
                                foto barang
                            </th>

                            <th class="name">
                                barang
                            </th>

                            <th class="amount">
                                harga
                            </th>

                            <th class="quentity">
                                jumlah
                            </th>
                            <th class="total">
                                subtotal
                            </th>
                        </tr>
                        @foreach ($transaksi->detail_transaksi as $detail_transaksi)
                        <tr>
                            <td class="images">
                                <img src="{{ asset('storage/'.$detail_transaksi->barang->image_barang) }}" alt="bag" class="img-fluid w-100">
                            </td>

                            <td class="name">
                                <p>{{ $detail_transaksi->barang->nama_barang }}</p>
                                <span>kategori : {{ $detail_transaksi->barang->jenis_barang->nama_jenis }}</span>
                            </td>
                            <td class="amount">
                                @currency($detail_transaksi->harga_barang)
                            </td>

                            <td class="quentity">
                                {{ $detail_transaksi->jumlah }}
                            </td>
                            <td class="total">
                                @currency($detail_transaksi->jumlah * $detail_transaksi->harga_barang)
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="wsus__invoice_footer">
            <p><span>Subtotal:</span> @currency($transaksi->subtotal) </p>
            <p><span>Biaya Pengiriman:</span> @currency($transaksi->biaya_pengiriman) </p>
            <p><span>Total Transaksi:</span> @currency($transaksi->total_transaksi) </p>
        </div>
    </div>
</div>
@endsection

@section('dashboard-script')
<script>
    $(document).ready(function() {
        $('#barang-table').DataTable();
        } );

    function previewImage() {
        const image = document.querySelector('#bukti_transfer');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    function previewImageUbah() {
        const image = document.querySelector('#bukti_transfer-ubah');
        const imgPreview = document.querySelector('.img-preview-ubah');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
