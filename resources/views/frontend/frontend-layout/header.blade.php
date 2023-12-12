<header>
    <div class="container">
        <div class="row">
            <div class="col-2 col-md-1 d-lg-none">
                <div class="wsus__mobile_menu_area">
                    <span class="wsus__mobile_menu_icon"><i class="fal fa-bars"></i></span>
                </div>
            </div>
            <div class="col-xl-2 col-7 col-md-8 col-lg-2">
                <div class="wsus_logo_area">
                    <a class="wsus__header_logo" href="index.html">
                        <img src="{{ asset('storage/foto_nikki/logo.png') }}" alt="logo" class="img-fluid w-30">
                    </a>
                </div>
            </div>
            <div class="col-xl-5 col-md-6 col-lg-4 d-none d-lg-block">
                <div class="wsus__search">
                    <form action="/home-user/0">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <input type="text" placeholder="Search..." name="search">
                        <button type="submit"><i class="far fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-xl-5 col-3 col-md-3 col-lg-6">
                <div class="wsus__call_icon_area">
                    <div class="wsus__call_area">
                        {{-- Empty --}}
                    </div>
                    <ul class="wsus__icon_area">
                        @auth
                        <li>
                            <a class="wsus__cart_icon" href="{{ route('keranjang.index') }}">
                                <i class="fal fa-shopping-bag"></i>
                                {{-- <span>04</span> --}}
                            </a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>

</header>
