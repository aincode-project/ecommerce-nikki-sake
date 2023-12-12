@extends('backend.backend_layout.admin')

@section('backend')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Data Barang</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>
                    <li class="breadcrumb-item active">Data Barang</li>
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
                    <div class="col">
                        <a href="{{ route('barang.create') }}" style="float: right; background-color: palevioletred; color: white" class="btn waves-effect waves-light mb-3"><i class="fas fa-plus"></i> Tambah Barang</a>
                    </div>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Harga Barang</th>
                            <th>Stok Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>


                    <tbody>
                    @foreach ($dataBarangs as $dataBarang)
                        <tr>
                            <td>{{ $dataBarang->nama_barang }}</td>
                            <td>{{ $dataBarang->jenis_barang->nama_jenis }}</td>
                            <td class="text-end">@currency($dataBarang->harga_barang)</td>
                            <td class="text-end">{{ $dataBarang->stok_barang }}</td>
                            <td>
                                <a href="{{ route('barang.edit', $dataBarang->id) }}" style="color: gray"><i class="fas fa-pencil-alt"></i></a>
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
