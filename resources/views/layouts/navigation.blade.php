<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg" alt="" class="img-circle elevation-2">
        </div>
        <div class="info">
 <a href="{{ route('profile.show') }}" class="d-block text-uppercase">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>


            @if ( Auth::user()->role == 'admin' ||  Auth::user()->role == 'kasir' )

            <li class="nav-item">
                <a href="{{ route('customers.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Pelanggan') }}
                    </p>
                </a>
            </li>
            @endif



            {{-- <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li> --}}
            @if (Auth::user()->role == 'gudang' || Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
            <li class="nav-item">
                <a href="{{ route('spareparts.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-wrench"></i>
                    <p>
                        {{ __('Penjualan Spareparts') }}
                    </p>
                </a>
            </li>
        @endif



        @if ( Auth::user()->role == 'admin' )
            <li class="nav-item">
                <a href="{{ route('jasas.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-toolbox"></i>
                    <p>
                        {{ __(' Jasa') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-id-card"></i>
                    <p>
                        {{ __('Karyawan') }}
                    </p>
                </a>
            </li>

            @endif
            <li class="nav-item">
                <a href="{{ route('transactions.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>
                        {{ __('Transaksi') }}
                    </p>
                </a>
            </li>



{{--
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>
                        {{ __('Report') }}
                    </p>
                </a>
            </li> --}}



            {{-- <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About us') }}
                    </p>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        Two-level menu
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Child menu</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
