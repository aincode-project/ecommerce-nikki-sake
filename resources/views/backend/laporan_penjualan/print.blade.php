<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Gaya CSS disini */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
        }

        thead {
            background-color: #3498db;
            color: #fff;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 16px;
            text-align: left;
            width: 100%;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .styled-table thead tr {
            background-color: #3498db;
            color: #fff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
        }
        .styled-table tbody tr {
            transition: background-color 0.3s;
        }
        .styled-table tbody tr:hover {
            background-color: #f5f5f5;
        }
        .styled-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

            /* header {
                padding: 20px;
                background-color: #3498db;
                color: #fff;
                display: flex;
                justify-content: space-between;
                align-items: center;
            } */

            .card-header {
                background-color: #3498db;
                color: #fff;
            }

            .card-header img {
                max-height: 100px;
            }

            .perusahaan-info p {
                margin: 0;
                /* color: #333; */
            }
            /*
            .perusahaan-info {
                max-width: 60%;
            }

            .perusahaan-info h1,
            .perusahaan-info p {
                margin: 0;
                color: #333;
            }

            .perusahaan-info p {
                margin-top: 5px;
                font-size: 14px;
            } */
    </style>
</head>
<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <img src="https://arakbalinikki.com/media/uploads/2021/11/logo-ns-1.png" alt="Logo Perusahaan">
                    <div class="perusahaan-info">
                        <p>Email: nikkisakebali@gmail.com</p>
                        <p>Br. Bengkel, Desa Antiga Kelod, Kec. Manggis, Kab. Karangasem, Bali</p>
                    </div>
                </div>
                <div class="card-body">
                    <table  class="styled-table table-sm" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Tanggal Transaksi</th>
                                <th>Nama Customer</th>
                                <th>Total Transaksi</th>
                            </tr>
                        </thead>


                        <tbody>
                        @foreach ($dataTransaksis as $dataTransaksi)
                            <tr>
                                <td>{{ Carbon\Carbon::parse($dataTransaksi->tanggal_transaksi)->format('d F Y') }}</td>
                                <td>{{ $dataTransaksi->customer->nama_customer }}</td>
                                <td style="text-align: right">@currency($dataTransaksi->total_transaksi)</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" style="text-align: center">Total</th>
                                <td style="text-align: right">@currency($dataTransaksis->sum('total_transaksi'))</td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</body>
</html>
