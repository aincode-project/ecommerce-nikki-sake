@extends('frontend.frontend-layout.dashboard-customer')

@section('dashboard-content')
<div class="dashboard_content">
    <h3><i class="fas fa-list-ul"></i> transaksi</h3>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="transaksi-customer-table" class="table table-striped table-bordered" style="width:100%">
                  <thead class="text-center" style="background-color: rgb(53, 146, 213); color: white">
                    <tr>
                      <th>Tanggal Transaksi</th>
                      <th>Total Transaksi</th>
                      <th>Status Transaksi</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataTransaksis as $dataTransaksi)
                    <tr>
                        <td>{{ $dataTransaksi->tanggal_transaksi }}</td>
                        <td class="text-end">@currency($dataTransaksi->total_transaksi)</td>
                        <td>{{ $dataTransaksi->status_transaksi }}</td>
                        <td class="text-center"><a class="btn btn-outline-primary btn-sm" href="{{ route('transaksi-customer.show', $dataTransaksi->id) }}">view</a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="wsus__dashboard_order"> --}}
      {{-- <div class="table-responsive">
        <table id="barang-table" class="table" style="width:100%">
          <thead>
            <tr>
              <th class="p_date">tanggal transaksi</th>
              <th class="p_date">Total transaksi</th>
              <th class="p_date">status transaksi</th>
              <th class="status">details</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dataPesanans as $dataPesanan)
            <tr>
                <td class="p_date">{{ $dataPesanan->tanggal_pesanan }}</td>
                <td class="p_date">@currency($dataPesanan->total_pesanan)</td>
                <td class="p_date">{{ $dataPesanan->status_pesanan }}</td>
                <td class="status"><a href="dsahboard_order_invoice.html">view</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div> --}}
      {{-- <div id="pagination">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <i class="fas fa-chevron-left"></i>
              </a>
            </li>
            <li class="page-item"><a class="page-link page_active" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <i class="fas fa-chevron-right"></i>
              </a>
            </li>
          </ul>
        </nav>
      </div> --}}
    {{-- </div> --}}
  </div>
@endsection

@section('dashboard-script')
<script>
    $(document).ready(function() {
        $('#transaksi-customer-table').DataTable();
        } );
</script>
@endsection
