@extends('backend.backend_layout.admin')

@section('backend')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Nikki Sake</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Total Pendapatan & Penjualan</p>
                        <h4 class="mb-2">@currency($total_penjualan)</h4>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-primary rounded-3">
                            <i class="ri-shopping-cart-2-line font-size-24"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Total Barang Terjual</p>
                        <h4 class="mb-2">{{ $total_barang_terjual }}</h4>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-success rounded-3">
                            <i class="mdi mdi-currency-usd font-size-24"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Jumlah Customer</p>
                        <h4 class="mb-2">{{ $jumlah_customer }}</h4>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-primary rounded-3">
                            <i class="ri-user-3-line font-size-24"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">Grafik Penjualan Bulanan</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="yearFilter" class="form-label">Pilih Tahun:</label>
                        <select id="yearFilter" class="form-select">
                            @foreach ($tahun as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach

                            {{-- <option value="2024">2024</option> --}}
                            <!-- Tambahkan opsi lain sesuai dengan tahun yang ada di data Anda -->
                        </select>
                    </div>
                </div>
                <div id="grafik_penjualan"></div>
            </div>
        </div>
    </div>
</div>
<!--end row-->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">Grafik Barang Terjual</div>
            <div class="card-body">
                <div id="grafik_barang"></div>
            </div>
        </div>
    </div>
</div>
<!--end row-->
@endsection

@section('backend-script')
<script type="text/javascript">
    $(document).ready(function() {
        var chart;
        var salesData = [];

        // Inisialisasi grafik awal
        createChart(2023); // Gantilah tahun awal sesuai kebutuhan

        $('#yearFilter').change(function() {
            var selectedYear = $(this).val();
            updateChart(selectedYear);
        });

        function createChart(year) {
            // Fetch data penjualan berdasarkan tahun yang dipilih
            $.ajax({
                url: '/get-monthly-sales-data',
                method: 'GET',
                data: { year: year },
                success: function(response) {
                    salesData = response;
                    renderSalesChart();
                },
                error: function() {
                    alert('Terjadi kesalahan dalam mengambil data.');
                }
            });
        }

        function updateChart(year) {
            // Fetch data penjualan berdasarkan tahun yang dipilih
            $.ajax({
                url: '/get-monthly-sales-data',
                method: 'GET',
                data: { year: year },
                success: function(response) {
                    salesData = response;
                    renderSalesChart();
                },
                error: function() {
                    alert('Terjadi kesalahan dalam mengambil data.');
                }
            });
        }

        function renderSalesChart() {
            Highcharts.chart('grafik_penjualan', {
                // chart: {
                //     type: 'column'
                // },
                credits: {
                    enabled: false
                },
                title: {
                    text: 'Grafik Penjualan Bulanan'
                },
                xAxis: {
                    categories: salesData.labels,
                    title: {
                        text: 'Bulan'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Nominal penjualan Bulanan'
                    }
                },
                plotOptions : {
                    series : {
                        allowPointSelect: true
                    }
                },
                series: [{
                    name: 'Penjualan',
                    colorByPoint: true,
                    data: salesData.data
                }]
            });
        }
    });

    var jumlah_terjual = <?php echo json_encode($jumlah_terjual) ?>;
    var nama_barang = <?php echo json_encode($nama_barang) ?>;
    Highcharts.chart('grafik_barang', {
        chart: {
			type: 'bar',
		},
        credits: {
			enabled: false
		},
        title : {
            text: 'Grafik Barang Terjual'
        },
        xAxis : {
            categories : nama_barang
        },
        yAxis : {
            title : {
                text : 'Jumlah Barang Terjual'
            }
        },
        plotOptions : {
            series : {
                allowPointSelect: true
            }
        },
        series :
        [
            {
                name: 'Jumlah Terjual',
                colorByPoint: true,
                data: jumlah_terjual
            }
        ],
    });
</script>
@endsection
