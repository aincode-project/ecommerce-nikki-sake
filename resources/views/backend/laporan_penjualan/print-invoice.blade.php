<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
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
                                </div>
                            </div>

                        </div>
                    </div> <!-- end row -->

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
