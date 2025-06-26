<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper">
            <a href="{{route('admin.dashboard')}}">
                <img class="img-fluid for-light" src="../assets/admin/images/logo/Anindhaloka.png" alt="">
            </a>
        </div>
        <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
                
                <li class="sidebar-main-title">
                    <div>
                        <a href="{{route('admin.dashboard')}}"><h6 class="lan-1">Dashboard </h6></a>
                    </div>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6>Menu</h6>
                    </div>
                </li>
                <li class="sidebar-list">
                    <i class="fa fa-dashboard"></i>
                    <a class="sidebar-link sidebar-title link-nav" href="{{route('admin.dashboard')}}">
                        </svg><span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{route('admin.ruangan')}}">
                        </svg><span>Ruangan</span>
                    </a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{route('admin.fasilitas')}}">
                    </svg><span>Fasilitas Tambahan</span></a></li>
                <!-- <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{route('admin.ruanganHarga')}}">
                    <svg class="stroke-icon">
                    <use href="../assets/admin/svg/icon-sprite.svg#stroke-calendar"></use>
                    </svg>
                    <svg class="fill-icon">
                    <use href="../assets/admin/svg/icon-sprite.svg#fill-calender"></use>
                    </svg><span>Harga Ruangan</span></a></li> -->
                <!-- <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{route('admin.transaksiRuangan')}}">
                    <svg class="stroke-icon">
                    <use href="../assets/admin/svg/icon-sprite.svg#stroke-contact"></use>
                    </svg>
                    <svg class="fill-icon">
                    <use href="../assets/admin/svg/icon-sprite.svg#fill-contact"> </use>
                    </svg><span>Penyewaan Ruangan</span></a></li> -->
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{route('admin.transaksiFasilitas')}}">
                    </svg><span>Penyewaan Ruangan</span>
                    </a>
                </li>
            </ul>   
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
    </div>
</div>