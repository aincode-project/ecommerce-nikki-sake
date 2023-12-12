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
                    <h4>Keranjang</h4>
                    <ul>
                        <li><a href="{{ route('home-user.index', 0) }}">home</a></li>
                        <li><a href="{{ route('keranjang.index') }}">Keranjang</a></li>
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
    CART VIEW PAGE START
==============================-->
<section id="wsus__cart_view">
    <div class="container">
        @if ($dataKeranjangs->count() == 0)
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__cart_list cart_empty p-3 p-sm-5 text-center">
                    <p class="mb-4">Keranjang Belanja Anda Kosong</p>
                    <a href="{{ route('home-user.index', 0) }}" class="common_btn"><i class="fal fa-store me-2"></i>Lihat Produk Kami</a>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-xl-9">
                <div class="wsus__cart_list">
                    <div class="table-responsive">
                        <table>
                            <tbody>
                                <tr class="d-flex">
                                    <th class="wsus__pro_img">
                                        Barang
                                    </th>

                                    <th class="wsus__pro_name">
                                        Detail Barang
                                    </th>

                                    <th class="wsus__pro_status">
                                        Harga
                                    </th>

                                    <th class="wsus__pro_select">
                                        Jumlah
                                    </th>

                                    <th class="wsus__pro_tk">
                                        Subtotal
                                    </th>

                                    <th class="wsus__pro_icon">
                                        <form action="{{ route('keranjang.destroyAll', Auth::user()->customer->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="common_btn">Kosongkan</button>
                                        </form>
                                        {{-- <a href="#" class="common_btn">Kosongkan</a> --}}
                                    </th>
                                </tr>
                                @foreach ($dataKeranjangs as $dataKeranjang)
                                <tr class="d-flex">
                                    <td class="wsus__pro_img">
                                        <img src="{{ asset('storage/' . $dataKeranjang->barang->image_barang) }}" alt="product"
                                            class="img-fluid w-100">
                                    </td>

                                    <td class="wsus__pro_name">
                                        <p>{{ $dataKeranjang->barang->nama_barang }}</p>
                                        <span>Kategori: {{ $dataKeranjang->barang->jenis_barang->nama_jenis }}</span>
                                        <span>Stok: {{ $dataKeranjang->barang->stok_barang }}</span>
                                    </td>

                                    <td class="wsus__pro_status">
                                        <h6>@currency($dataKeranjang->barang->harga_barang)</h6>
                                    </td>

                                    <td class="wsus__pro_select">
                                        <h6>{{$dataKeranjang->jumlah}} <a href="" data-bs-toggle="modal" data-bs-target="#jumlahUpdate{{$dataKeranjang->id}}" class="btn btn-sm" style="color: orange"><i class="far fa-pen"></i></a></h6>
                                        <div class="wsus__popup_address">
                                            <div class="modal fade" id="jumlahUpdate{{$dataKeranjang->id}}" tabindex="-1" aria-labelledby="jumlahUpdateLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="jumlahUpdateLabel">ubah jumlah</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-0">
                                                            <div class="wsus__check_form p-3">
                                                                <form action="{{ route('keranjang.updateJumlah', $dataKeranjang->id) }}" method="POST">
                                                                    @method('put')
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="wsus__check_single_form">
                                                                                <label for="">Nama Barang</label>
                                                                                <input type="text" disabled value="{{ $dataKeranjang->barang->nama_barang }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="wsus__pro_select">
                                                                                <label for="">Jumlah</label>
                                                                                <div class="select_number">
                                                                                    <input class="number_area" name="jumlahBaru" type="text" min="1" max="{{ $dataKeranjang->barang->stok_barang }}" value="{{ $dataKeranjang->jumlah }}" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-12">
                                                                            <div class="wsus__check_single_form">
                                                                                <button type="submit" class="btn btn-primary">Ubah</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="wsus__pro_tk">
                                        <h6>@currency($dataKeranjang->barang->harga_barang * $dataKeranjang->jumlah)</h6>
                                    </td>

                                    <td class="wsus__pro_icon">
                                        <form action="{{ route('keranjang.destroy', $dataKeranjang->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger"><i class="far fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                    <a class="common_btn mt-4 w-100 text-center" href="{{ route('checkout.index') }}">checkout</a>
                </div>
            </div>
        </div>
        @endif
    </div>

</section>
<!--============================
        CART VIEW PAGE END
==============================-->
@endsection

@section('frontend-script')

@endsection
