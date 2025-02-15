<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="../assets/admin/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="../assets/admin/images/logo/logo_dark.png" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/admin/images/logo/logo-icon.png" alt=""></a></div>
        <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn"><a href="index.html"><img class="img-fluid" src="../assets/admin/images/logo/logo-icon.png" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                </li>
                <li class="pin-title sidebar-main-title">
                    <div> 
                        <h6>Pinned</h6>
                    </div>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6 class="lan-1">General</h6>
                    </div>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6 class="lan-8">Applications</h6>
                    </div>
                </li>
                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{route('admin.ruangan')}}">
                    <svg class="stroke-icon">
                    <use href="../assets/admin/svg/icon-sprite.svg#stroke-bookmark"></use>
                    </svg>
                    <svg class="fill-icon">
                    <use href="../assets/admin/svg/icon-sprite.svg#fill-bookmark"> </use>
                    </svg><span>Ruangan</span></a></li>
                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{route('admin.fasilitas')}}">
                    <svg class="stroke-icon">
                    <use href="../assets/admin/svg/icon-sprite.svg#stroke-bookmark"></use>
                    </svg>
                    <svg class="fill-icon">
                    <use href="../assets/admin/svg/icon-sprite.svg#fill-bookmark"> </use>
                    </svg><span>Fasilitas</span></a></li>
                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{route('admin.ruanganHarga')}}">
                    <svg class="stroke-icon">
                    <use href="../assets/admin/svg/icon-sprite.svg#stroke-calendar"></use>
                    </svg>
                    <svg class="fill-icon">
                    <use href="../assets/admin/svg/icon-sprite.svg#fill-calender"></use>
                    </svg><span>Harga Ruangan</span></a></li>
                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{route('admin.transaksiRuangan')}}">
                    <svg class="stroke-icon">
                    <use href="../assets/admin/svg/icon-sprite.svg#stroke-contact"></use>
                    </svg>
                    <svg class="fill-icon">
                    <use href="../assets/admin/svg/icon-sprite.svg#fill-contact"> </use>
                    </svg><span>Penyewaan Ruangan</span></a></li>
                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{route('admin.transaksiFasilitas')}}">
                    <svg class="stroke-icon">
                    <use href="../assets/admin/svg/icon-sprite.svg#stroke-contact"></use>
                    </svg>
                    <svg class="fill-icon">
                    <use href="../assets/admin/svg/icon-sprite.svg#fill-contact"> </use>
                    </svg><span>Penyewaan Fasilitas</span></a></li>
            </ul>   
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
    </div>
</div>