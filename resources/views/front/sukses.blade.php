@extends('template.front.main')
@section('content')
<div id="app" class="bg-primary-2">
    <section id="hiro" class=" mb-6">
        <div class="container flex flex-col justify-center py-8">
            <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">
                Pesan Ruangan
            </h2>
            <div class="grid grid-cols-3 gap-12">
                <div class="flex flex-col gap-2 col-span-2 font-secondary">
                    <div class="grid grid-cols-1 items-center bg-primary-1 rounded-lg p-8">
                        <h2 class="w-full text-start font-semibold text-xl mb-4">
                            Selasa, 6 Desember 2024, 09:00 - 23:00
                        </h2>
                        <div class="flex mb-4">
                            <span class="py-1 px-2 rounded-xl bg-green-600 text-white text-start">
                                <i class="fa-solid fa-check bg-white text-green-600 p-1 rounded-full"></i>
                                Terkonfirmasi
                            </span>
                        </div>
                        <div class="flex flex-col divide-y-2 divide-primary-5">
                            <div class="grid grid-cols-3 py-3">
                                <div class="col-span-2 flex gap-2 justify-start">
                                    <img src="../../../assets/front/image/Anindhaloka Logo.png" class="h-auto" alt="">
                                    <div class="flex flex-col gap-1">
                                        <h2 class="font-primary font-semibold uppercase text-xl text-primary-5">
                                            Nin Space
                                        </h2>
                                        <p>Jl. YRS No.20, RT.2/RW.1, Bintaro, Kec. Pesanggrahan,
                                            Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta</p>
                                        <p>Booking ref. #: 65742695</p>
                                    </div>
                                </div>
                                <div class="col-span-1 flex justify-evenly">
                                    <div class="flex flex-col items-center gap-1">
                                        <div class="flex justify-center">
                                            <button
                                                class="rounded-md bg-primary-5 items-center text-center p-4 text-white">
                                                <i class="fa-solid fa-xmark text-4xl"></i>
                                            </button>
                                        </div>
                                        <h2 class="text-center">
                                            Cancel
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between py-3">
                                <h2 class=" text-2xl font-semibold">Plataran</h2>
                                <p class="">IDR XXXXXX</p>
                            </div>
                            <div class="flex justify-between py-3">
                                <h2 class=" text-2xl font-semibold">Cemilan</h2>
                                <p class="">IDR XXXXXX</p>
                            </div>
                            <div class="py-3">
                                <div class="flex justify-between">
                                    <h2 class=" text-xl">Pajak</h2>
                                    <p class="">IDR XXXXXX</p>
                                </div>
                                <div class="flex justify-between">
                                    <h2 class=" text-2xl font-semibold">Plataran</h2>
                                    <p class="">IDR XXXXXX</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex flex-col mb-4">
                        <button class="text-primary-2 bg-primary-5 rounded-xl py-2 px-4">Kembali</button>
                    </div>
                    <h2 class="w-full text-center font-primary font-semibold uppercase text-xl text-primary-5 mb-3">
                        Pesanan yang akan datang
                    </h2>
                    <div
                        class="flex flex-col divide-y-2 divide-primary-5 bg-primary-1 rounded-lg border-2 border-primary-5 mb-4">
                        <div class="flex justify-center items-center p-2">
                            <img src="../../../assets/front/image/Anindhaloka Logo.png" width="60px" alt="">
                            <h2 class="font-primary font-semibold uppercase text-xl text-primary-5">Nin Space
                            </h2>
                        </div>
                        <div class="flex flex-col py-4 p-2">
                            <h2 class="text-primary-5 text-2xl font-semibold text-start">Plataran</h2>
                            <p class="text-end">Selasa, 6 Desember 2022</p>
                            <p class="text-end">09:00 - 23:00 WIB</p>
                        </div>
                    </div>
                    <h2 class="w-full text-center font-primary font-semibold uppercase text-xl text-primary-5 mb-3">
                        RIwayat Pesanan
                    </h2>
                    <div
                        class="flex flex-col divide-y-2 divide-primary-5 bg-primary-1 rounded-lg">
                        <div class="flex justify-center items-center p-2">
                            <img src="../../../assets/front/image/Anindhaloka Logo.png" width="60px" alt="">
                            <h2 class="font-primary font-semibold uppercase text-xl text-primary-5">Nin Space
                            </h2>
                        </div>
                        <div class="flex flex-col py-4 p-2">
                            <h2 class="text-primary-5 text-2xl font-semibold text-start">Plataran</h2>
                            <p class="text-end">Selasa, 6 Desember 2022</p>
                            <p class="text-end">09:00 - 23:00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection