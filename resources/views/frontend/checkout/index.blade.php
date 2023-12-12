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
                    <h4>check out</h4>
                    <ul>
                        <li><a href="{{ route('home-user.index', 0) }}">home</a></li>
                        <li><a href="{{ route('checkout.index') }}">check out</a></li>
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
    CHECK OUT PAGE START
==============================-->
<section id="wsus__cart_view">
    <div class="container">
        <form class="wsus__checkout_form" action="#" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl-7 col-lg-6">
                    <div class="wsus__check_form">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="wsus__checkout_single_address">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="alamat_pengiriman"
                                            id="{{ 'alamat_pengiriman_' . $dataCustomer->id }}" value="{{ $dataCustomer->id }}" checked>
                                        <label class="form-check-label" for="{{ 'alamat_pengiriman_' . $dataCustomer->id }}">
                                            Address
                                        </label>
                                    </div>
                                    <ul>
                                        <li><span>Nama Penerima :</span> {{ $dataCustomer->nama_customer }}</li>
                                        <li><span>No Telp :</span> {{ $dataCustomer->no_telp }}</li>
                                        <li><span>Alamat  :</span> {{ $dataCustomer->alamat }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="wsus__order_details" id="sticky_sidebar">
                        <p class="wsus__product">detail pesanan</p>
                        <div class="wsus__order_details_summery">
                            <p>jumlah produk: <span>{{ $totalProduk }} Produk</span></p>
                            <p>biaya pengiriman: <span>@currency(30000)</span></p>
                            <p><b>total:</b> <span><b>@currency($subtotal + 30000)</b></span></p>
                            <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                        </div>
                        <button class="common_btn">Proses Pesanan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--============================
    CHECK OUT PAGE END
==============================-->
@endsection

@section('frontend-script')

@endsection
