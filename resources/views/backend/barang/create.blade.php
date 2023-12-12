@extends('backend.backend_layout.admin')

@section('backend')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Tambah Barang</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>
                    <li class="breadcrumb-item active">Data Barang</li>
                    <li class="breadcrumb-item active">Tambah Barang</li>
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

                <form class="form-horizontal mt-3" method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input id="nama_barang" type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang') }}" required autocomplete="nama_barang" autofocus placeholder="Nama Barang">

                            @error('nama_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <select class="form-select" name="jenis_barang_id" aria-label="jenis_barang_id">
                                <option selected disabled>Jenis Barang</option>
                                @foreach ($dataJenisBarangs as $dataJenisBarang)
                                    <option value="{{ $dataJenisBarang->id }}">{{ $dataJenisBarang->nama_jenis }}</option>
                                @endforeach
                            </select>

                            @error('jenis_barang_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input id="harga_barang" type="text" class="form-control @error('harga_barang') is-invalid @enderror" name="harga_barang" value="{{ old('harga_barang') }}" required autocomplete="harga_barang" autofocus placeholder="Harga Barang">

                            @error('harga_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input id="stok_barang" type="text" class="form-control @error('stok_barang') is-invalid @enderror" name="stok_barang" value="{{ old('stok_barang') }}" required autocomplete="stok_barang" placeholder="Stok Barang">

                            @error('stok_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <img class="img-preview img-fluid mb-3 col-sm-3">
                            <input id="image_barang" type="file" class="form-control @error('image_barang') is-invalid @enderror" name="image_barang" value="{{ old('image_barang') }}" required autocomplete="image_barang" onchange="previewImage()">

                            @error('image_barang')
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

@section('backend-script')
<script>
    function previewImage() {
        const image = document.querySelector('#image_barang');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
