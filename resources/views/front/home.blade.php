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
                <a href="{{route('promo')}}" class="hover:text-red-500">
                    <button
                        class="border-primary-5 border text-primary-5 py-2 px-4 rounded-2xl hover:bg-primary-1 hover:text-white">
                        Lihat Semua
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </a>
            </div>
            <div class="overflow-x-auto">
                <div class="flex flex-nowrap gap-4 mt-4">
                    <a class="w-1/3 rounded-lg flex-shrink-0 hover:scale-90 transition-transform duration-300">
                        <img src="../../../assets/front/image/Promo.png" alt="">
                    </a>
                    <a class="w-1/3 rounded-lg flex-shrink-0 hover:scale-90 transition-transform duration-300">
                        <img src="../../../assets/front/image/Promo.png" alt="">
                    </a>
                    <a class="w-1/3 rounded-lg flex-shrink-0 hover:scale-90 transition-transform duration-300">
                        <img src="../../../assets/front/image/Promo.png" alt="">
                    </a>
                    <a class="w-1/3 rounded-lg flex-shrink-0 hover:scale-90 transition-transform duration-300">
                        <img src="../../../assets/front/image/Promo.png" alt="">
                    </a>
                    <a class="w-1/3 rounded-lg flex-shrink-0 hover:scale-90 transition-transform duration-300">
                        <img src="../../../assets/front/image/Promo.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="fasilitas" class="bg-primary-4">
            <div class="container flex flex-col justify-center py-8">
                <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">
                    fasilitas
                </h2>
                <div class="flex justify-center ">
                    <div class="grid grid-cols-8 gap-2 text-primary-5 w-3/5">
                        <div class="flex flex-col gap-2 items-center">
                            <i class="fa-solid fa-car text-3xl"></i>
                            <h2 class="text-center text-xs font-thin">Parkiran Luas</h2>
                        </div>
                        <div class="flex flex-col gap-2 items-center">
                            <i class="fa-solid fa-wifi text-3xl"></i>
                            <h2 class="text-center text-xs font-thin">Wifi</h2>
                        </div>
                        <div class="flex flex-col gap-2 items-center">
                            <i class="fa-solid fa-building text-3xl"></i>
                            <h2 class="text-center text-xs font-thin">Ruangan Terhubung</h2>
                        </div>

                        <div class="flex flex-col gap-2 items-center">
                            <i class="fa-solid fa-joint text-3xl"></i>
                            <h2 class="text-center text-xs font-thin">Ruangan Bebas Asap Rokok</h2>
                        </div>
                        <div class="flex flex-col gap-2 items-center">
                            <i class="fa-solid fa-toilet text-3xl"></i>
                            <h2 class="text-center text-xs font-thin">Toilet</h2>
                        </div>
                        <div class="flex flex-col gap-2 items-center">
                            <i class="fa-solid fa-coffee text-3xl"></i>
                            <h2 class="text-center text-xs font-thin">Caffe</h2>
                        </div>
                        <div class="flex flex-col gap-2 items-center">
                            <i class="fa-solid fa-home text-3xl"></i>
                            <h2 class="text-center text-xs font-thin">Balkon</h2>
                        </div>
                        <div class="flex flex-col gap-2 items-center">
                            <i class="fa-solid fa-music text-3xl"></i>
                            <h2 class="text-center text-xs font-thin">Ruang Musik</h2>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section id="ruangan">
        <div class="container flex flex-col justify-center py-8">
            <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Ruangan
            </h2>
            <div class="overflow-x-auto">
                <div class="flex flex-nowrap gap-4 text-primary-5">
                    @foreach($data as $Ruangan)
                    <div class="relative rounded-lg text-white flex-shrink-0 w-1/2">
                        <img src="{{ url('/assets/front/image/'.$Ruangan->image) }}" class="rounded-xl z-0 relative" height="120%" alt="">
                        <div
                            class="absolute inset-x-0 bottom-0 bg-primary-5 z-10 px-4 py-2 rounded-xl divide-y-2 divide-white">
                            <div class="flex justify-between py-2 items-center">
                                <div class="flex flex-col">
                                    <h2 class=" font-primary text-lg uppercase">{{$Ruangan->nama_ruangan}}</h2>
                                    <div class="flex gap-2 items-center">
                                        <i class="fa-solid fa-expand"></i>
                                        <p>Ukuran ruangan : {{$Ruangan->panjang_ruangan}} X {{$Ruangan->lebar_ruangan}} meter</p>
                                    </div>
                                </div>
                                <button class="bg-primary-2 openModal text-primary-5 px-4 py-1 rounded-lg">Lihat lebih
                                    lengkap</button>
                            </div>
                            <div class="flex justify-between py-2 items-center">
                                <h2 class=" font-primary text-lg uppercase">IDR XXXXX</h2>
                                <a href="{{route('pesan1')}}" class="hover:text-red-500">
                                    <button class="bg-primary-2 text-primary-5 px-4 py-1 rounded-lg">Pesan Sekarang</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section id="Informasi">
            <div class="container flex flex-col justify-center py-8">
                <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">
                    Informasi
                </h2>
                <div class="overflow-x-auto">
                    <div class="flex flex-nowrap gap-3 text-primary-5">
                        <div class="rounded-lg w-1/4 flex-shrink-0 hover:scale-95 transition-transform duration-300">
                            <img src="../../../assets/front/image/Pasar Bahagia (1).jpg" alt="">
                        </div>
                        <div class="rounded-lg w-1/4 flex-shrink-0 hover:scale-95 transition-transform duration-300">
                            <img src="../../../assets/front/image/Pasar Bahagia (2).jpg" alt="">
                        </div>
                        <div class="rounded-lg w-1/4 flex-shrink-0 hover:scale-95 transition-transform duration-300">
                            <img src="../../../assets/front/image/Pasar Bahagia (3).jpg" alt="">
                        </div>
                        <div class="rounded-lg w-1/4 flex-shrink-0 hover:scale-95 transition-transform duration-300">
                            <img src="../../../assets/front/image/Pasar Bahagia (4).jpg" alt="">
                        </div>
                        <div class="rounded-lg w-1/4 flex-shrink-0 hover:scale-95 transition-transform duration-300">
                            <img src="../../../assets/front/image/Pasar Bahagia (5).jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<div id="modal" class="fixed z-50 inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-primary-1 rounded-lg w-2/5 shadow-lg max-h-screen overflow-y-auto">
        <!-- Bagian Atas dengan Overflow Hidden -->
        <div class="w-full relative rounded-t-lg overflow-hidden">
            <img src="../../../assets/front/image/Plataran.jpg" class="w-full h-64 object-cover rounded-lg" alt="Gambar Modal">
            <button id="closeModal"
                class="absolute top-2 text-white right-2 bg-primary-5 px-2 py-1 hover:bg-red-500 focus:outline-none">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="flex w-full bottom-3 px-4 justify-between absolute">
                <span class="text-white bg-primary-5 px-2 py-1 flex text-sm items-center gap-2 rounded-md">
                    <i class="fa-solid fa-users"></i>
                    Kapasitas : XX Orang
                </span>
                <span class="text-white bg-primary-5 px-2 py-1 flex text-sm items-center gap-2 rounded-md">
                    <i class="fa-solid fa-expand"></i>
                    Ukuran Ruangan : XX Meter <sup>2</sup>
                </span>
            </div>
        </div>
        <!-- Konten Modal -->
        <div class="p-4 flex justify-between">
            <div class="flex flex-col">
                <h2 class=" font-primary text-lg uppercase">Plataran</h2>
                <h2 class=" font-primary text-base uppercase">IDR XXXXX</h2>
            </div>
            <button class="bg-primary-5 text-white px-4 py-1 rounded-lg">Pesan Sekarang</button>
        </div>
        <hr class="h-1 my-1 mx-4 bg-primary-5 border-0 dark:bg-gray-700">
        <div class="p-4">
            <p class="text-center">Plataran artinya serambi atau halaman rumah. Plataran merupakan ruang
                terbuka (outdoor) yang hijau dan sejuk, berlokasi di halaman Rumah
                Anindhaloka. Plataran sangat sesuai untuk kegiatan kumpul keluarga,
                komunitas, maupun bisnis, seperti ulang tahun, peluncuran produk, pertunjukan
                musik, dan office gathering.</p>
        </div>
        <hr class="h-1 my-1 mx-4 bg-primary-5 border-0 dark:bg-gray-700">
        <div class="p-4 justify-center flex flex-col text-primary-5">
            <h2 class="w-full font-primary text-lg uppercase text-center">Fasilitas</h2>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex justify-end items-center gap-2">
                    <p class="text-right">Speaker</p>
                    <i class="fa-solid fa-volume-high w-8 text-center"></i>
                </div>
                <div class="flex justify-start items-center gap-2">
                    <i class="fa-solid fa-bolt w-8 text-center"></i>
                    <p class="text-left">Listrik</p>
                </div>
                <div class="flex justify-end items-center gap-2">
                    <p class="text-right">Mic</p>
                    <i class="fa-solid fa-microphone w-8 text-center"></i>
                </div>
                <div class="flex justify-start items-center gap-2">
                    <i class="fa-solid fa-wifi w-8 text-center"></i>
                    <p class="text-left">Internet</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection