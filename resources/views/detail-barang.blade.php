@extends('frontend.frontend-layout.admin')

@section('frontend-content')
<!--============================
    BREADCRUMB START
==============================-->
<section id="wsus__breadcrumb">
    <div class="wsus_breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Detail Barang</h4>
                    <ul>
                        <li><a href="{{ route('home-user.index', 0) }}">home</a></li>
                        <li><a href="#" style="pointer-events: none">detail barang</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============================
    BREADCRUMB END
==============================-->


<!--============================
    PRODUCT DETAILS START
==============================-->
<section id="wsus__product_details">
    <div class="container">
        <div class="wsus__details_bg">
            <div class="row">
                <div class="col-xl-4 col-md-5 col-lg-5">
                    <div id="sticky_pro_zoom">
                        <ul class='exzoom_img_ul'>
                            <li><img class="zoom ing-fluid w-100" src="{{ asset('storage/' . $dataBarang->image_barang) }}" alt="product"></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-md-7 col-lg-7">
                    <div class="wsus__pro_details_text">
                        <a class="title" href="#" style="pointer-events: none">{{ $dataBarang->nama_barang }}</a>
                        @if ($dataBarang->stok_barang == 0)
                        <p class="wsus__stock_area"><span class="out_stock">Stok Kosong</span></p>
                        @else
                        <p class="wsus__stock_area"><span class="in_stock">Stok Tersedia</span> ({{ $dataBarang->stok_barang }} item)</p>
                        @endif
                        <h4>@currency($dataBarang->harga_barang)</h4>
                        <div class="wsus__quentity">
                            <h5>Jumlah :</h5>
                            <form action="{{ route('keranjang.store') }}" method="post" class="select_number">
                                @method('PUT')
                                @csrf
                                @auth
                                <input type="hidden" name="customer_id" value="{{ Auth::user()->customer->id }}">
                                @endauth
                                <input type="hidden" name="barang_id" value="{{ $dataBarang->id }}">
                                @if ($dataBarang->stok_barang == 0)
                                <input class="number_area" type="text" name="jumlah" min="1" max="{{ $dataBarang->stok_barang }}" value="0" />
                                @else
                                <input class="number_area" type="text" name="jumlah" min="1" max="{{ $dataBarang->stok_barang }}" value="1" />
                                @endif
                        </div>
                        <ul class="wsus__button_area">
                            <li><button class="add_cart" @guest
                                disabled
                            @endguest @if ($dataBarang->stok_barang == 0)
                                disabled
                            @endif>Tambah ke Keranjang</button></li>
                        </ul>
                            </form>
                        <p class="brand_model"><span>kategori :</span> {{ $dataBarang->jenis_barang->nama_jenis }}</p><br>
                        @auth
                        <p class="brand_model"><span>jumlah di keranjang anda :</span>
                            @php
                                $jumlahKeranjang = $dataKeranjangs->where('barang_id', $dataBarang->id)->first();
                                if ($jumlahKeranjang) {
                                    echo $jumlahKeranjang->jumlah;
                                } else {
                                    echo 0;
                                }
                            @endphp
                        </p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-xl-12">
                <div class="wsus__pro_det_description">
                    <div class="wsus__details_bg">
                        <ul class="nav nav-pills mb-3" id="pills-tab3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab7" data-bs-toggle="pill"
                                    data-bs-target="#pills-home22" type="button" role="tab"
                                    aria-controls="pills-home" aria-selected="true">Deskripsi</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent4">
                            <div class="tab-pane fade  show active " id="pills-home22" role="tabpanel"
                                aria-labelledby="pills-home-tab7">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="wsus__description_area">
                                            {{ $dataBarang->keterangan }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> --}}
    </div>
</section>
<!--============================
    PRODUCT DETAILS END
==============================-->
@endsection
