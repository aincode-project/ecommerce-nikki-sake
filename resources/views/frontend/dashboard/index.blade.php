@extends('frontend.frontend-layout.dashboard-customer')

@section('dashboard-content')
<div class="dashboard_content">
    <div class="wsus__dashboard">
        <div class="row">
        {{-- <div class="col-xl-2 col-6 col-md-4">
            <a class="wsus__dashboard_item red" href="{{ route('transaksi.index') }}">
            <i class="far fa-address-book"></i>
            <p>Transaksi</p>
            </a>
        </div> --}}
        {{-- <div class="col-xl-2 col-6 col-md-4">
            <a class="wsus__dashboard_item green" href="dsahboard_download.html">
            <i class="fal fa-cloud-download"></i>
            <p>download</p>
            </a>
        </div>
        <div class="col-xl-2 col-6 col-md-4">
            <a class="wsus__dashboard_item sky" href="dsahboard_review.html">
            <i class="fas fa-star"></i>
            <p>review</p>
            </a>
        </div>
        <div class="col-xl-2 col-6 col-md-4">
            <a class="wsus__dashboard_item blue" href="dsahboard_wishlist.html">
            <i class="far fa-heart"></i>
            <p>wishlist</p>
            </a>
        </div> --}}
        {{-- <div class="col-xl-2 col-6 col-md-4">
            <a class="wsus__dashboard_item orange" href="{{ route('profil-customer.index') }}">
            <i class="fas fa-user-shield"></i>
            <p>profil</p>
            </a>
        </div>
        <div class="col-xl-2 col-6 col-md-4">
            <a class="wsus__dashboard_item purple" href="{{ route('alamat-customer.index') }}">
            <i class="fal fa-map-marker-alt"></i>
            <p>alamat</p>
            </a>
        </div> --}}
        </div>
        <div class="row">
        <div class="col-xl-12">
            {{-- Empty --}}
        </div>
        </div>
    </div>
</div>
@endsection
