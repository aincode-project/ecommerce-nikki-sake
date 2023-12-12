@extends('frontend.frontend-layout.admin')

@section('frontend-content')
<!--============================
    BANNER PART 2 START
==============================-->
<section id="wsus__banner">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__banner_content">
                    <div class="row banner_slider">
                        <div class="col-xl-12">
                            <div class="wsus__single_slider" style="background: url({{ asset('storage/foto_banner/1.png') }});">
                                <div class="wsus__single_slider_text">
                                    <h3 style="opacity: 0">new arrivals</h3>
                                    <h1 style="opacity: 0">men's fashion</h1>
                                    <h6 style="opacity: 0">start at $99.00</h6>
                                    <a style="opacity: 0; pointer-events: none" class="common_btn" href="#">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="wsus__single_slider" style="background: url({{ asset('storage/foto_banner/2.png') }});">
                                <div class="wsus__single_slider_text">
                                    <h3 style="opacity: 0">new arrivals</h3>
                                    <h1 style="opacity: 0">kid's fashion</h1>
                                    <h6 style="opacity: 0">start at $49.00</h6>
                                    <a style="opacity: 0; pointer-events: none" class="common_btn" href="#">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="wsus__single_slider" style="background: url({{ asset('storage/foto_banner/3.png') }});">
                                <div class="wsus__single_slider_text">
                                    <h3 style="opacity: 0">new arrivals</h3>
                                    <h1 style="opacity: 0">winter collection</h1>
                                    <h6 style="opacity: 0">start at $99</h6>
                                    <a style="opacity: 0; pointer-events: none" class="common_btn" href="#">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============================
    BANNER PART 2 END
==============================-->

<section id="wsus__product_page">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                {{-- <div class="wsus__sidebar_filter ">
                    <p>filter</p>
                    <span class="wsus__filter_icon">
                        <i class="far fa-minus" id="minus"></i>
                        <i class="far fa-plus" id="plus"></i>
                    </span>
                </div> --}}
                <div class="wsus__product_sidebar" id="sticky_sidebar">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <a href="{{ route('home-user.index', 0) }}" class="accordion-button">Semua Kategori</a>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        @foreach ($dataJenisBarangs as $dataJenisBarang)
                                        <li>
                                            <a href="{{ route('home-user.index', $dataJenisBarang->id) }}">{{ $dataJenisBarang->nama_jenis }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="row">
                    {{-- <div class="col-xl-12 d-none d-md-block mt-md-4 mt-lg-0">
                        <div class="wsus__product_topbar">
                            <div class="wsus__product_topbar_left">
                                <div class="nav nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-home" type="button" role="tab"
                                        aria-controls="v-pills-home" aria-selected="true">
                                        <i class="fas fa-th"></i>
                                    </button>
                                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-profile" type="button" role="tab"
                                        aria-controls="v-pills-profile" aria-selected="false">
                                        <i class="fas fa-list-ul"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="wsus__topbar_select">
                                <select class="select_2" name="state">
                                    <option>show 12</option>
                                    <option>show 15</option>
                                    <option>show 18</option>
                                    <option>show 21</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="row">
                                @foreach ($dataBarangs as $dataBarang)
                                <div class="col-xl-4  col-sm-6">
                                    <div class="wsus__product_item">
                                        {{-- <span class="wsus__new">New</span> --}}
                                        @if ($dataBarang->stok_barang == 0)
                                        <span class="btn btn-danger btn-sm" style="border-radius: 25px">Kosong</span>
                                        @endif
                                        <a class="wsus__pro_link" href="{{ route('home-user.show', $dataBarang->id) }}">
                                            <img src="{{ asset('storage/' . $dataBarang->image_barang) }}" alt="product"
                                                class="img-fluid w-100 img_1" />
                                            <img src="{{ asset('storage/' . $dataBarang->image_barang) }}" alt="product"
                                                class="img-fluid w-100 img_2" />
                                        </a>
                                        <div class="wsus__product_details">
                                            <a class="wsus__category" href="{{ route('home-user.index', $dataBarang->jenis_barang_id) }}">{{ $dataBarang->jenis_barang->nama_jenis }} </a>
                                            {{-- <p class="wsus__pro_rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <span>(17 review)</span>
                                            </p> --}}
                                            <a class="wsus__pro_name" href="{{ route('home-user.show', $dataBarang->id) }}">{{ $dataBarang->nama_barang }}</a>
                                            <p class="wsus__price">@currency($dataBarang->harga_barang)</p>
                                            @if ($dataBarang->jumlah_terjual != 0)
                                            <p class="wsus__category">{{ $dataBarang->jumlah_terjual }} Terjual</p>
                                            @endif
                                            {{-- <a class="add_cart" href="#">add to cart</a> --}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <section id="pagination">
                    <div class="d-flex justify-content-center">
                        {!! $dataBarangs->links('vendor.pagination.default') !!}
                    </div>
                    {{-- <nav aria-label="Page navigation example">
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
                    </nav> --}}
                </section>
            </div>
        </div>
    </div>
</section>
<!--Products Tabs-->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Verifikasi Umur</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <p>Selamat Datang di Website E-Commerce UD. Nikki Sake Bali</p>
                <p>Apakah anda sudah berumur 21 tahun atau lebih?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('verification.verify') }}" method="post">
                    @csrf
                    <button type="submit"  class="btn btn-primary waves-effect waves-light">Ya</button>
                </form>
                <button type="button" class="btn btn-light waves-effect" id="btnOpenModal2">Tidak</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="staticBackdropLabel">Static backdrop</h5> --}}
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <p>MOHON MAAF ANDA BELUM BISA MENGAKSES WEBSITE INI !!!</p>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Save</button> --}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('frontend-script')
    <!-- Tambahkan skrip JavaScript -->
    <script>
        $(document).ready(function() {
            // Buka modal secara otomatis saat halaman dimuat
            $('#staticBackdrop').modal('show');

            // Tangani klik pada tombol untuk membuka modal kedua
            $('#btnOpenModal2').on('click', function() {
                $('#staticBackdrop').modal('hide');
                $('#staticBackdrop1').modal('show');
            });
        });
    </script>
@endsection
