<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        {{-- <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ asset('build/assets/backend-assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">Julia Hudda</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div> --}}

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Dashboard</li>

                <li>
                    <a href="{{ route('home') }}" class="waves-effect" style="{{ Request::is('home') ? 'background-color: #252b3b; color: white' : '' }}">
                        <i class="ri-dashboard-line" style="{{ Request::is('home') ? 'color: white' : '' }}"></i>
                        {{-- <span class="badge rounded-pill bg-success float-end">3</span> --}}
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Data Master</li>

                <li>
                    <a href="{{ route('user.index') }}" class="waves-effect" style="{{ Request::is('user*') ? 'background-color: #252b3b; color: white' : '' }}">
                        <i class="ri-dashboard-line" style="{{ Request::is('user*') ? 'color: white' : '' }}"></i>
                        {{-- <span class="badge rounded-pill bg-success float-end">3</span> --}}
                        <span>Data User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('customer.index') }}" class="waves-effect" style="{{ Request::is('customer*') ? 'background-color: #252b3b; color: white' : '' }}">
                        <i class="ri-dashboard-line" style="{{ Request::is('customer*') ? 'color: white' : '' }}"></i>
                        {{-- <span class="badge rounded-pill bg-success float-end">3</span> --}}
                        <span>Data Customer</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('jenis-barang.index') }}" class="waves-effect" style="{{ Request::is('jenis-barang*') ? 'background-color: #252b3b; color: white' : '' }}">
                        <i class="ri-dashboard-line" style="{{ Request::is('jenis-barang*') ? 'color: white' : '' }}"></i>
                        {{-- <span class="badge rounded-pill bg-success float-end">3</span> --}}
                        <span>Data Jenis Barang</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('barang.index') }}" class="waves-effect" style="{{ Request::is('barang*') ? 'background-color: #252b3b; color: white' : '' }}">
                        <i class="ri-dashboard-line" style="{{ Request::is('barang*') ? 'color: white' : '' }}"></i>
                        {{-- <span class="badge rounded-pill bg-success float-end">3</span> --}}
                        <span>Data Barang</span>
                    </a>
                </li>

                <li class="menu-title">Data Transaksi</li>

                <li>
                    <a href="{{ route('validasi-pembayaran.index') }}" class="waves-effect" style="{{ Request::is('validasi-pembayaran*') ? 'background-color: #252b3b; color: white' : '' }}">
                        <i class="ri-dashboard-line" style="{{ Request::is('validasi-pembayaran*') ? 'color: white' : '' }}"></i>
                        {{-- <span class="badge rounded-pill bg-success float-end">3</span> --}}
                        <span>Validasi Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengiriman.index') }}" class="waves-effect" style="{{ Request::is('pengiriman*') ? 'background-color: #252b3b; color: white' : '' }}">
                        <i class="ri-dashboard-line" style="{{ Request::is('pengiriman*') ? 'color: white' : '' }}"></i>
                        {{-- <span class="badge rounded-pill bg-success float-end">3</span> --}}
                        <span>Pengiriman</span>
                    </a>
                </li>

                <li class="menu-title">Laporan</li>

                <li>
                    <a href="{{ route('laporan-penjualan.index') }}" class="waves-effect" style="{{ Request::is('laporan-penjualan*') ? 'background-color: #252b3b; color: white' : '' }}">
                        <i class="ri-dashboard-line" style="{{ Request::is('laporan-penjualan*') ? 'color: white' : '' }}"></i>
                        {{-- <span class="badge rounded-pill bg-success float-end">3</span> --}}
                        <span>Laporan Penjualan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('laporan-stok-barang.index') }}" class="waves-effect" style="{{ Request::is('laporan-stok-barang*') ? 'background-color: #252b3b; color: white' : '' }}">
                        <i class="ri-dashboard-line" style="{{ Request::is('laporan-stok-barang*') ? 'color: white' : '' }}"></i>
                        {{-- <span class="badge rounded-pill bg-success float-end">3</span> --}}
                        <span>Laporan Stok Barang</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
