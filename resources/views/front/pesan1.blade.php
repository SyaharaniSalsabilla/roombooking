@extends('template.front.main')
@section('content')
<section id="hiro" class=" mb-6"><section id="hiro" class=" mb-6">
    <div class="container flex flex-col justify-center py-8">
        <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Pesan
            Ruangan
        </h2>
        <div class="grid grid-cols-3 gap-12">
            <div class="flex flex-col gap-2 col-span-2 font-secondary text-justify">
                <p>Langkah 1 dari 4</p>
                <h2 class="w-full font-primary font-semibold text-3xl text-primary-5 mb-2">
                    Pilih Ruangan
                </h2>
                <div class="flex flex-col mb-2 gap-2">
                    <div class="flex bg-primary-1 rounded-lg justify-between items-center">
                        <label class="flex items-center space-x-3 cursor-pointer group p-4 rounded-md">
                            <div class="relative flex items-center">
                                <input type="radio" name="terms"
                                    class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary-5 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-red-500 before:opacity-0 before:transition-opacity hover:before:opacity-10 checked:border-red-500 checked:before:bg-red-500" />
                                <div
                                    class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-primary-5 opacity-0 transition-opacity peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                        viewBox="0 0 16 16" fill="currentColor">
                                        <circle cx="8" cy="8" r="4" />
                                    </svg>
                                </div>
                            </div>
                            <span class="text-lg text-primary-5">
                                Plataran
                            </span>
                        </label>
                        <button class="text-primary-2 openModal bg-primary-5 rounded-2xl py-1 px-3 mr-2">Lihat
                            Lebih lengkap
                        </button>
                    </div>
                    <div class="flex bg-primary-1 rounded-lg justify-between items-center">
                        <label class="flex items-center space-x-3 cursor-pointer group p-4 rounded-md">
                            <div class="relative flex items-center">
                                <input type="radio" name="terms"
                                    class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary-5 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-red-500 before:opacity-0 before:transition-opacity hover:before:opacity-10 checked:border-red-500 checked:before:bg-red-500" />
                                <div
                                    class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-primary-5 opacity-0 transition-opacity peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                        viewBox="0 0 16 16" fill="currentColor">
                                        <circle cx="8" cy="8" r="4" />
                                    </svg>
                                </div>
                            </div>
                            <span class="text-lg text-primary-5">
                                Plataran
                            </span>
                        </label>
                        <button class="text-primary-2 openModal bg-primary-5 rounded-2xl py-1 px-3 mr-2">Lihat
                            Lebih lengkap</button>
                    </div>
                    <div class="flex bg-primary-1 rounded-lg justify-between items-center">
                        <label class="flex items-center space-x-3 cursor-pointer group p-4 rounded-md">
                            <div class="relative flex items-center">
                                <input type="radio" name="terms"
                                    class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary-5 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-red-500 before:opacity-0 before:transition-opacity hover:before:opacity-10 checked:border-red-500 checked:before:bg-red-500" />
                                <div
                                    class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-primary-5 opacity-0 transition-opacity peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                        viewBox="0 0 16 16" fill="currentColor">
                                        <circle cx="8" cy="8" r="4" />
                                    </svg>
                                </div>
                            </div>
                            <span class="text-lg text-primary-5">
                                Plataran
                            </span>
                        </label>
                        <button class="text-primary-2 openModal bg-primary-5 rounded-2xl py-1 px-3 mr-2">Lihat
                            Lebih lengkap</button>
                    </div>
                    <div class="flex bg-primary-1 rounded-lg justify-between items-center">
                        <label class="flex items-center space-x-3 cursor-pointer group p-4 rounded-md">
                            <div class="relative flex items-center">
                                <input type="radio" name="terms"
                                    class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary-5 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-red-500 before:opacity-0 before:transition-opacity hover:before:opacity-10 checked:border-red-500 checked:before:bg-red-500" />
                                <div
                                    class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-primary-5 opacity-0 transition-opacity peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                        viewBox="0 0 16 16" fill="currentColor">
                                        <circle cx="8" cy="8" r="4" />
                                    </svg>
                                </div>
                            </div>
                            <span class="text-lg text-primary-5">
                                Plataran
                            </span>
                        </label>
                        <button class="text-primary-2 openModal bg-primary-5 rounded-2xl py-1 px-3 mr-2">Lihat
                            Lebih lengkap</button>
                    </div>
                    <div class="flex bg-primary-1 rounded-lg justify-between items-center">
                        <label class="flex items-center space-x-3 cursor-pointer group p-4 rounded-md">
                            <div class="relative flex items-center">
                                <input type="radio" name="terms"
                                    class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary-5 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-red-500 before:opacity-0 before:transition-opacity hover:before:opacity-10 checked:border-red-500 checked:before:bg-red-500" />
                                <div
                                    class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-primary-5 opacity-0 transition-opacity peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                        viewBox="0 0 16 16" fill="currentColor">
                                        <circle cx="8" cy="8" r="4" />
                                    </svg>
                                </div>
                            </div>
                            <span class="text-lg text-primary-5">
                                Plataran
                            </span>
                        </label>
                        <button class="text-primary-2 openModal bg-primary-5 rounded-2xl py-1 px-3 mr-2">Lihat
                            Lebih lengkap</button>
                    </div>
                    <div class="flex bg-primary-1 rounded-lg justify-between items-center">
                        <label class="flex items-center space-x-3 cursor-pointer group p-4 rounded-md">
                            <div class="relative flex items-center">
                                <input type="radio" name="terms"
                                    class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary-5 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-red-500 before:opacity-0 before:transition-opacity hover:before:opacity-10 checked:border-red-500 checked:before:bg-red-500" />
                                <div
                                    class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-primary-5 opacity-0 transition-opacity peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                        viewBox="0 0 16 16" fill="currentColor">
                                        <circle cx="8" cy="8" r="4" />
                                    </svg>
                                </div>
                            </div>
                            <span class="text-lg text-primary-5">
                                Plataran
                            </span>
                        </label>
                        <button class="text-primary-2 openModal bg-primary-5 rounded-2xl py-1 px-3 mr-2">Lihat
                            Lebih lengkap</button>
                    </div>
                </div>
                <h2 class="w-full font-primary font-semibold text-3xl text-primary-5 mb-2">
                    Pilih Tambahan
                </h2>
                <div class=" bg-primary-1 rounded-lg">
                    <table
                        class="table-auto w-full overflow-hidden text-sm border-collapse border border-slate-400" >
                        <thead class="border border-red-600">
                            <tr class="text-primary-5 border">
                                <th class="py-3 px-4 text-left border border-slate-400">No</th>
                                <th class="py-3 px-4 text-left border border-slate-400">Nama</th>
                                <th class="py-3 px-4 text-left border border-slate-400">Keterangan</th>
                                <th class="py-3 px-4 text-left border border-slate-400">Harga</th>
                                <th class="py-3 px-4 text-left border border-slate-400">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td class="py-3 px-4 border border-slate-400">1</td>
                                <td class="py-3 px-4 border border-slate-400">Catering Sarapan</td>
                                <td class="py-3 px-4 border border-slate-400">
                                    <div class="flex flex-col gap-1">
                                        <span>1 paket = 5 porsi sarapan</span>
                                        <button
                                            class="bg-primary-5 openModal2 text-white px-3 py-1 rounded text-sm w-fit">Lihat
                                            Detail</button>
                                    </div>
                                </td>
                                <td class="py-3 px-4 border border-slate-400">Rp xxxxxxxx</td>
                                <td class="py-3 px-4 border border-slate-400">
                                    <div class="flex items-center gap-3">
                                        <button class="text-primary-5 font-bold text-xl">−</button>
                                        <span>1</span>
                                        <button class="text-primary-5 font-bold text-xl">+</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="py-3 px-4 border border-slate-400">2</td>
                                <td class="py-3 px-4 border border-slate-400">Catering Makan Siang</td>
                                <td class="py-3 px-4 border border-slate-400">
                                    <div class="flex flex-col gap-1">
                                        <span>1 paket = 5 porsi makan siang</span>
                                        <button
                                            class="bg-primary-5 openModal2 text-white px-3 py-1 rounded text-sm w-fit">Lihat
                                            Detail</button>
                                    </div>
                                </td>
                                <td class="py-3 px-4 border border-slate-400">Rp xxxxxxxx</td>
                                <td class="py-3 px-4 border border-slate-400">
                                    <div class="flex items-center gap-3">
                                        <button class="text-primary-5 font-bold text-xl">−</button>
                                        <span>1</span>
                                        <button class="text-primary-5 font-bold text-xl">+</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-span-1">
                <div class="flex flex-col mb-4">
                    <button class="text-primary-2 bg-primary-5 rounded-xl py-2 px-4">Kembali</button>
                </div>
                <div class="flex flex-col divide-y-2 divide-primary-5 bg-primary-1 rounded-lg">
                    <div class="flex justify-center items-center p-2">
                        <img src="../assets/Anindhaloka Logo.png" width="60px" alt="">
                        <h2 class="font-primary font-semibold uppercase text-xl text-primary-5">Nin Space
                        </h2>
                    </div>
                    <div class="grid grid-cols-2 items-center py-2">
                        <h2 class="text-primary-5 text-2xl font-semibold text-center">Plantaran</h2>
                        <p class="text-center">IDR XXXXXX</p>
                    </div>
                    <div class="grid grid-cols-2 items-center py-2">
                        <h2 class="text-primary-5 text-2xl font-semibold text-center">Cemilan</h2>
                        <p class="text-center">IDR XXXXXX</p>
                    </div>
                    <div class="grid grid-cols-2 items-center py-2">
                        <h2 class="text-primary-5 text-2xl font-semibold text-center">Total</h2>
                        <p class="text-center">IDR XXXXXX</p>
                    </div>
                    <div class="grid grid-cols-1 items-center p-4">
                    <a href="{{route('pesan2')}}" class="hover:text-red-500">
                        <button class="text-primary-2 bg-primary-5 rounded-xl py-2 px-8">Lanjutkan</button>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
    <div id="modal2" class="fixed z-50 inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-primary-1 rounded-lg w-1/4 shadow-lg max-h-screen">
            <!-- Bagian Atas dengan Overflow Hidden -->
            <div class="w-full relative rounded-lg">
                <img src="../../../assets/front/image/Sarapan.png" class="w-full object-cover rounded-lg" alt="Gambar Modal">
                <button id="closeModal2"
                    class="absolute top-2 text-white right-2 bg-primary-5 px-2 py-1 hover:bg-red-500 focus:outline-none">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>
    </div>
@endsection