@extends('backend.backend_layout.admin')

@section('backend')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Ubah Jenis Barang</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>
                    <li class="breadcrumb-item active">Data Jenis Barang</li>
                    <li class="breadcrumb-item active">Ubah Jenis Barang</li>
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

                <form class="form-horizontal mt-3" method="POST" action="{{ route('jenis-barang.update', $jenisBarang->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input id="nama_jenis" type="text" class="form-control @error('nama_jenis') is-invalid @enderror" name="nama_jenis" value="{{ $jenisBarang->nama_jenis }}" required autocomplete="nama_jenis" autofocus placeholder="Nama Jenis Barang">

                            @error('nama_jenis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group text-end row mt-3 pt-1">
                        <div class="col">
                            <button class="btn btn-info waves-effect waves-light" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
                <!-- end form -->

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
