@extends('backend.backend_layout.admin')

@section('backend')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Data User</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>
                    <li class="breadcrumb-item active">Data User</li>
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
                        <a href="{{ route('user.create') }}" style="float: right; background-color: palevioletred; color: white" class="btn waves-effect waves-light mb-3"><i class="fas fa-plus"></i> Tambah Users</a>
                    </div>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>


                    <tbody>
                    @foreach ($dataUsers as $dataUser)
                        <tr>
                            <td>{{ $dataUser->name }}</td>
                            <td>{{ $dataUser->username }}</td>
                            <td>{{ $dataUser->email }}</td>
                            @if ($dataUser->hak_akses == 0)
                                <td>Developer</td>
                            @elseif ($dataUser->hak_akses == 1)
                                <td>Admin</td>
                            @elseif ($dataUser->hak_akses == 2)
                                <td>Pegawai</td>
                            @elseif ($dataUser->hak_akses == 3)
                                <td>Customer</td>
                            @endif

                            <td><a href="{{ route('user.edit', $dataUser->id) }}" style="color: gray"><i class="fas fa-pencil-alt"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
