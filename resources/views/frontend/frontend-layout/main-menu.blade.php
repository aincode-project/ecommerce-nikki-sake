<nav class="wsus__main_menu d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="relative_contect d-flex">
                    <div class="wsus_menu_category_bar">
                        <i class="far fa-bars"></i>
                    </div>
                    <ul class="wsus_menu_cat_item show_home toggle_menu">
                        @foreach ($dataJenisBarangs as $dataJenisBarang)
                        <li>
                            <a href="{{ route('home-user.index', $dataJenisBarang->id) }}"><i class="fas fa-star"></i> {{ $dataJenisBarang->nama_jenis }}</a>
                        </li>
                        @endforeach
                    </ul>

                    <ul class="wsus__menu_item">
                        <li><a href="{{ route('home-user.index', 0) }}">home</a></li>
                    </ul>
                    <ul class="wsus__menu_item wsus__menu_item_right">
                        {{-- <li><a href="#">contact</a></li> --}}
                        @auth
                        <li><a href="{{ route('transaksi-customer.index') }}">my account</a></li>
                        @endauth
                        @guest
                        <li><a href="{{ route('login') }}">login</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
