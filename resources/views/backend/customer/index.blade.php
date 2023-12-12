@extends('backend.backend_layout.admin')

@section('backend')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Data Customer</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>
                    <li class="breadcrumb-item active">Data Customer</li>
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
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($dataCustomers as $dataCustomer)
                        <tr>
                            <td>{{ $dataCustomer->nama_customer }}</td>
                            <td>{{ $dataCustomer->alamat }}</td>
                            <td>{{ $dataCustomer->no_telp }}</td>
                            <td>{{ $dataCustomer->user->username }}</td>
                            <td>{{ $dataCustomer->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
