@extends('template.front.main')
@section('content')
<div id="app"> 
    <section id="hiro" class="relative top-0 w-full bg-center bg-cover"
        style="background-image: url('../../../assets/front/image/nin1.jpg'); margin-top: 0;">
        <div class="absolute inset-0 opacity-50 bg-primary-4"></div>
        <div
            class="container relative flex items-center justify-center min-h-svh h-full px-4 mx-auto text-center text-primary-5 z-51">
            <div
                class="flex w-3/4 items-center justify-center gap-2 p-2 bg-primary-1/90 backdrop-blur-sm rounded-lg shadow-sm border">
                <div class="relative flex-1">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" placeholder="Cari berdasarkan Nama/Ruangan"
                        class="w-full pl-9 py-2 bg-transparent border-0 focus:outline-none focus:ring-0">
                </div>
                <div class="relative flex-1">
                    <i class="far fa-calendar absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" id="date-range" placeholder="Tanggal Awal - Tanggal Akhir"
                        class="w-full pl-9 py-2 bg-transparent border-0 focus:outline-none focus:ring-0">
                </div>
                <button class="bg-red-600 hover:bg-red-700 text-white px-8 py-2 rounded">
                    Cari
                </button>
            </div>
        </div>
    </section>
    <section id="promo">
        <div class="container py-8">
            <div class="flex justify-between items-center">
                <h2 class="font-primary font-semibold text-primary-5 text-3xl uppercase">Promo</h2>
                <button
                    class="border-primary-5 border text-primary-5 py-2 px-4 rounded-2xl hover:bg-primary-1 hover:text-white">
                    Lihat Semua
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
            <div class="flex gap-4 mt-4">
                <div class="flex-1 rounded-lg">
                    <img src="../../../assets/front/image/Promo.png" alt="">
                </div>
                <div class="flex-1 rounded-lg">
                    <img src="../../../assets/front/image/Promo.png" alt="">
                </div>
                <div class="flex-1 rounded-lg">
                    <img src="../../../assets/front/image/Promo.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <section id="fasilitas" class="bg-primary-4">
        <div class="container flex flex-col justify-center py-8">
            <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">fasilitas
            </h2>
            <div class="flex justify-center ">
                <div class="grid grid-cols-8 gap-2 text-primary-5 w-3/5">
                    <div class="flex flex-col gap-2 items-center">
                        <i class="fa-solid fa-car text-3xl"></i>
                        <h2 class="text-center text-sm font-thin">Parkiran Luas</h2>
                    </div>
                    <div class="flex flex-col gap-2 items-center">
                        <i class="fa-solid fa-wifi text-3xl"></i>
                        <h2 class="text-center text-sm font-thin">Wifi</h2>
                    </div>
                    <div class="flex flex-col gap-2 items-center">
                        <i class="fa-solid fa-car text-3xl"></i>
                        <h2 class="text-center text-sm font-thin">Ruangan Terhubung</h2>
                    </div>

                    <div class="flex flex-col gap-2 items-center">
                        <i class="fa-solid fa-car text-3xl"></i>
                        <h2 class="text-center text-sm font-thin">Ruangan Bebas Asap Rokok</h2>
                    </div>
                    <div class="flex flex-col gap-2 items-center">
                        <i class="fa-solid fa-car text-3xl"></i>
                        <h2 class="text-center text-sm font-thin">Toilet</h2>
                    </div>
                    <div class="flex flex-col gap-2 items-center">
                        <i class="fa-solid fa-car text-3xl"></i>
                        <h2 class="text-center text-sm font-thin">Caffe</h2>
                    </div>
                    <div class="flex flex-col gap-2 items-center">
                        <i class="fa-solid fa-car text-3xl"></i>
                        <h2 class="text-center text-sm font-thin">Balkon</h2>
                    </div>
                    <div class="flex flex-col gap-2 items-center">
                        <i class="fa-solid fa-car text-3xl"></i>
                        <h2 class="text-center text-sm font-thin">Ruang Musik</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="ruangan">
        <div class="container flex flex-col justify-center py-8">
            <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Ruangan
            </h2>
            <div class="flex justify-center ">
                <div class="grid grid-cols-2 gap-4 text-primary-5 w-full">
                    <div class="rounded-lg">
                        <img src="../../../assets/front/image/Plataran.jpg" class="rounded-3xl" alt="">
                    </div>
                    <div class="rounded-lg">
                        <img src="../../../assets/front/image/Plataran.jpg" class="rounded-3xl" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="Informasi">
        <div class="container flex flex-col justify-center py-8">
            <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Informasi
            </h2>
            <div class="flex justify-center ">
                <div class="grid grid-cols-4 gap-4 text-primary-5 w-full">
                    <div class="rounded-lg">
                        <img src="../../../assets/front/image/Pasar Bahagia (1).jpg" alt="">
                    </div>
                    <div class="rounded-lg">
                        <img src="../../../assets/front/image/Pasar Bahagia (2).jpg" alt="">
                    </div>
                    <div class="rounded-lg">
                        <img src="../../../assets/front/image/Pasar Bahagia (3).jpg" alt="">
                    </div>
                    <div class="rounded-lg">
                        <img src="../../../assets/front/image/Pasar Bahagia (4).jpg" alt="">
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection