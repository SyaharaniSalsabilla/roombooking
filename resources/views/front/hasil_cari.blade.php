@extends('template.front.main')
@section('content')
<div id="app" class="bg-primary-2">
    <section id="hiro" class=" mb-6">
        <div class="container flex flex-col justify-center py-8">
            <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">
                Hasil Pencarian
            </h2>
            <div class="grid grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md mt-12">
                    <h2 class="text-xl font-semibold text-red-700 mb-4">Cari Berdasarkan:</h2>
                    <form class="space-y-4">
                        <div>
                            <label for="room-name" class="block text-neutral-700">Nama Ruangan</label>
                            <input type="text" id="room-name" placeholder="Cari Berdasarkan Nama Ruangan" class="w-full px-4 py-2 border border-neutral-300 rounded-lg focus:ring focus:ring-red-300 focus:outline-none">
                        </div>
                        <div>
                            <label for="date-range" class="block text-neutral-700">Tanggal Awal - Tanggal Akhir</label>
                            <input type="text" id="date-range" placeholder="Tanggal Awal - Tanggal Akhir" class="w-full px-4 py-2 border border-neutral-300 rounded-lg focus:ring focus:ring-red-300 focus:outline-none">
                        </div>
                        <button type="submit" class="w-full bg-primary-5 hover:bg-red-700 text-white font-semibold py-2 rounded-lg hover:bg-red-800">CARI</button>
                    </form>
                </div>

                @foreach($datas as $room)
                <div class="grid grid-cols-2 gap-6">
                    <div class="relative rounded-lg text-white mb-12">
                        <img src="../../../assets/front/image/Plataran.jpg" class="rounded-xl z-0 relative h-full" alt="">
                        <div
                            class="absolute inset-x-0 -bottom-12 bg-primary-5 z-10  px-4 py-2 rounded-xl divide-y-2 divide-white">
                            <div class="flex justify-between py-2 items-center">
                                <div class="flex flex-col">
                                    <h2 class=" font-primary text-lg uppercase">Putaran</h2>
                                    <div class="flex gap-2 items-center">
                                        <i class="fa-solid fa-expand"></i>
                                        <p>Ukuran ruangan : 91 meter <sup>2</sup></p>
                                    </div>
                                </div>
                                <button class="bg-white openModal text-primary-5 px-4 py-1 rounded-lg">Lihat lebih
                                    lengkap</button>
                            </div>
                            <div class="flex justify-between py-2 items-center">
                                <div class="flex gap-2 items-center">
                                    <h2 class=" font-primary text-lg uppercase">IDR XXXXX</h2>
                                </div>
                                <button class="bg-primary-2 text-primary-5 px-4 py-1 rounded-lg">Pesan Sekarang</button>
                            </div>
                        </div>
                    </div>
                @endforeach
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