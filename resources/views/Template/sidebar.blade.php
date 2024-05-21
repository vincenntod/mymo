<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('Gambar/Logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">MYMO BASO CEKER</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('Gambar/User.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                @if (auth()->check())
                    <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                @else
                    <a href="#" class="d-block">Guest</a>
                @endif
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Data Master for Admin and Gudang -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Data Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('admin dan gudang')
                            <li class="nav-item">
                                <a href="{{ route('data_barang') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Barang</p>
                                </a>
                            </li>
                            @endcan
                            @can('admin')
                            <li class="nav-item">
                                <a href="{{ route('data_menu') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Menu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('data_pesanan') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pesanan Pelanggan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('data_transaksi') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Transaksi Penjualan</p>
                                </a>
                            </li>
                            @endcan
                            @can('gudang')
                            <li class="nav-item">
                                <a href="{{ route('data_stock') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Stock Barang</p>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @can('admin dan pemilik')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Laporan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan

                <!-- Logout -->
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
