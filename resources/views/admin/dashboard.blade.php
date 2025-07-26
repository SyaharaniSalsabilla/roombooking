@extends('template.admin.main')
@section('header')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>
                        NinSpace</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="../assets/admin/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">NinSpace</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-xxl-10 col-md-12 box-col-8 grid-ed-12">
                <div class="row">
                    <div class="col-xxl-5 col-md-7 box-col-7">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card ">
                                    <div class="card-body primary"> <span class="f-light">Total Saldo</span>
                                        <h4 class="mb-3 mt-1 f-w-500 mb-0 f-22">
                                            IDR <span class=""> {{ $total_amount }} </span>
                                            <!-- <span class="f-light f-14 f-w-400 ms-1">at Total</span> -->
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="width-full col-6">
                                <div class="card small-widget">
                                    <div class="card-body primary"> <span class="f-light">Pesanan Baru Minggu Ini</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h4>{{ $weekly_orders_count }}</h4>
                                            <span class="font-primary f-12 f-w-500">
                                                <!-- <i class="icon-arrow-up"></i>
                                    <span></span> -->
                                            </span>
                                        </div>
                                        <div class="bg-gradient">
                                            <svg class="stroke-icon svg-fill">
                                                <use href="../assets/admin/svg/icon-sprite.svg#new-order"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="width-full col-6">
                                <div class="card small-widget">
                                    <div class="card-body warning"><span class="f-light">Pelanggan Baru Bulan Ini</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h4>{{ $recent_monthly_users }}</h4>
                                            <span class="font-warning f-12 f-w-500">
                                                <!-- <i class="icon-arrow-up"></i>
                                    <span></span> -->
                                            </span>
                                        </div>
                                        <div class="bg-gradient">
                                            <svg class="stroke-icon svg-fill">
                                                <use href="../assets/admin/svg/icon-sprite.svg#customers"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-6">
                    <div class="card small-widget">
                        <div class="card-body secondary"><span class="f-light">Average Sale</span>
                        <div class="d-flex align-items-end gap-1">
                            <h4>$389k</h4><span class="font-secondary f-12 f-w-500"><i class="icon-arrow-down"></i><span>-10%</span></span>
                        </div>
                        <div class="bg-gradient">
                            <svg class="stroke-icon svg-fill">
                            <use href="../assets/svg/icon-sprite.svg#sale"></use>
                            </svg>
                        </div>
                        </div>
                    </div>
                    </div>-->
                            <!--<div class="col-6">
                     <div class="card small-widget">
                        <div class="card-body success"><span class="f-light">Gross Profit</span>
                        <div class="d-flex align-items-end gap-1">
                            <h4>$3,908</h4><span class="font-success f-12 f-w-500"><i class="icon-arrow-up"></i><span>+80%</span></span>
                        </div>
                        <div class="bg-gradient">
                            <svg class="stroke-icon svg-fill">
                            <use href="../assets/admin/svg/icon-sprite.svg#profit"></use>
                            </svg>
                        </div>
                        </div>
                    </div>
                    </div>-->
                        </div>
                    </div>
                    <div class="col-xxl-7 col-md-5 col-sm-6 box-col-5">
                        <!-- col-xxl-10 col-md-12 box-col-8 grid-ed-12 -->
                        <div class="appointment">
                            <div class="card">
                                <div class="card-header card-no-border">
                                    <div class="header-top">
                                        <h5 class="m-0">Pemesanan Terbanyak</h5>
                                        <!-- <div class="card-header-right-icon">
                                            <div class="dropdown icon-dropdown">
                                            <button class="btn dropdown-toggle" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">
                                                Tomorrow</a><a class="dropdown-item" href="#">Yesterday</a></div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="appointment-table customer-table table-responsive">
                                        <table class="table table-bordernone">
                                            <tbody>
                                                @foreach ($customers as $cust)
                                                    <tr>
                                                        <td><i class="fas fa-user"> </i></td>
                                                        <td class="img-content-box"><a
                                                                class="f-w-500">{{ $cust->profile->nama }}</a>
                                                            <span class="f-light">{{ $cust->profile->email }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="width-full">
                        <div class="card recent-order">
                            <div class="card-header card-no-border">
                                <div class="header-top">
                                    <h5 class="m-0">Pesanan Terbaru Minggu Ini</h5>
                                    <!-- <div class="card-header-right-icon">
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="recentButton" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="recentButton"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday</a></div>
                                </div>
                            </div> -->
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="recent-sliders">
                                    <!-- <div class="nav nav-pills" id="v-pills-tab" role="tablist">
                                <button class="active frame-box" id="v-pills-shirt-tab" data-bs-toggle="pill" data-bs-target="#v-pills-shirt" type="button" role="tab" aria-controls="v-pills-shirt" aria-selected="true"><span class="frame-image"><img src="../assets/images/dashboard-2/order/1.png" alt="vector T-shirt"></span></button>
                                <button class="frame-box" id="v-pills-television-tab" data-bs-toggle="pill" data-bs-target="#v-pills-television" type="button" role="tab" aria-controls="v-pills-television" aria-selected="false"><span class="frame-image"><img src="../assets/images/dashboard-2/order/2.png" alt="vector television"></span></button>
                                <button class="frame-box" id="v-pills-headphone-tab" data-bs-toggle="pill" data-bs-target="#v-pills-headphone" type="button" role="tab" aria-controls="v-pills-headphone" aria-selected="false"><span class="frame-image"><img src="../assets/images/dashboard-2/order/3.png" alt="vector headphone"></span></button>
                                <button class="frame-box" id="v-pills-chair-tab" data-bs-toggle="pill" data-bs-target="#v-pills-chair" type="button" role="tab" aria-controls="v-pills-chair" aria-selected="false"><span class="frame-image"><img src="../assets/images/dashboard-2/order/4.png" alt="vector chair"></span></button>
                                <button class="frame-box" id="v-pills-lamp-tab" data-bs-toggle="pill" data-bs-target="#v-pills-lamp" type="button" role="tab" aria-controls="v-pills-lamp" aria-selected="false"><span class="frame-image"><img src="../assets/images/dashboard-2/order/5.png" alt="vector lamp"></span></button>
                                </div> -->
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-shirt" role="tabpanel"
                                            aria-labelledby="v-pills-shirt-tab">
                                            <div class="recent-table table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="f-light">Ruangan</th>
                                                            <th class="f-light">Pemesan</th>
                                                            <th class="f-light">Dari</th>
                                                            <th class="f-light">Sampai</th>
                                                            <th class="f-light">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($this_week_orders as $orders)
                                                            <tr>
                                                                <td class="f-w-500">{{ $orders->ruangan->nama_ruangan }}
                                                                </td>
                                                                <td class="f-w-500">
                                                                    {{ $orders->user->profile->nama ?? '-' }}</td>
                                                                <td class="f-w-500">{{ $orders->tanggal_awal }}</td>
                                                                <td class="f-w-500">{{ $orders->tanggal_akhir }}</td>
                                                                <td class="f-w-500">
                                                                    @if ($orders->status == 0)
                                                                        <span class="badge bg-warning">Menunggu
                                                                            Pembayaran</span>
                                                                    @elseif ($orders->status == 1)
                                                                        <span class="badge bg-success">Pembayaran
                                                                            Diterima</span>
                                                                    @elseif ($orders->status == 2)
                                                                        <span class="badge bg-info">Selesai</span>
                                                                    @else
                                                                        <span class="badge bg-danger">Dibatalkan</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-2 col-xl-3 col-md-4 grid-ed-none box-col-4e d-xxl-block d-none">
                <div class="card">
                    <div class="card-header card-no-border">
                        <h5>Top Categories</h5>
                    </div>
                    <div class="card-body pt-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
