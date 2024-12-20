@extends('template.front.main')
@section('content')
<div id="app" class="bg-primary-2">
        <section id="hiro" class=" mb-6">
            <div class="container flex flex-col justify-center py-8">
                <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Ruangan
                </h2>
                <div class="grid grid-cols-2 gap-6">
                    @foreach()
                        <div class="relative rounded-lg text-white mb-12">
                            <img src="../../../assets/front/image/Plataran.jpg" class="rounded-xl z-0 relative h-full" alt="">
                            <div
                                class="absolute inset-x-0 -bottom-12 bg-primary-5 z-10  px-4 py-2 rounded-xl divide-y-2 divide-white">
                                <div class="flex justify-between py-2 items-center">
                                    <div class="flex flex-col">
                                        <h2 class=" font-primary text-lg uppercase">Plataran</h2>
                                        <div class="flex gap-2 items-center">
                                            <i class="fa-solid fa-expand"></i>
                                            <p>Ukuran ruangan : 91 meter <sup>2</sup></p>
                                        </div>
                                    </div>
                                    <button class="bg-white text-primary-5 px-4 py-1 rounded-lg">Lihat lebih
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
                    <div class="relative rounded-lg text-white mb-12">
                        <img src="../../../assets/front/image/Sangita.jpg" class="rounded-xl z-0 relative h-full" alt="">
                        <div
                            class="absolute inset-x-0 -bottom-12 bg-primary-5 z-10  px-4 py-2 rounded-xl divide-y-2 divide-white">
                            <div class="flex justify-between py-2 items-center">
                                <div class="flex flex-col">
                                    <h2 class=" font-primary text-lg uppercase">Sangita</h2>
                                    <div class="flex gap-2 items-center">
                                        <i class="fa-solid fa-expand"></i>
                                        <p>Ukuran ruangan : 91 meter <sup>2</sup></p>
                                    </div>
                                </div>
                                <button class="bg-white text-primary-5 px-4 py-1 rounded-lg">Lihat lebih
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
                    <div class="relative rounded-lg text-white mb-12">
                        <img src="../../../assets/front/image/Paon.jpg" class="rounded-xl z-0 relative h-full" alt="">
                        <div
                            class="absolute inset-x-0 -bottom-12 bg-primary-5 z-10  px-4 py-2 rounded-xl divide-y-2 divide-white">
                            <div class="flex justify-between py-2 items-center">
                                <div class="flex flex-col">
                                    <h2 class=" font-primary text-lg uppercase">Paon</h2>
                                    <div class="flex gap-2 items-center">
                                        <i class="fa-solid fa-expand"></i>
                                        <p>Ukuran ruangan : 91 meter <sup>2</sup></p>
                                    </div>
                                </div>
                                <button class="bg-white text-primary-5 px-4 py-1 rounded-lg">Lihat lebih
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
                    <div class="relative rounded-lg text-white mb-12">
                        <img src="../../../assets/front/image/Nirnaya.jpg" class="rounded-xl z-0 relative h-full" alt="">
                        <div
                            class="absolute inset-x-0 -bottom-12 bg-primary-5 z-10  px-4 py-2 rounded-xl divide-y-2 divide-white">
                            <div class="flex justify-between py-2 items-center">
                                <div class="flex flex-col">
                                    <h2 class=" font-primary text-lg uppercase">Nirnaya</h2>
                                    <div class="flex gap-2 items-center">
                                        <i class="fa-solid fa-expand"></i>
                                        <p>Ukuran ruangan : 91 meter <sup>2</sup></p>
                                    </div>
                                </div>
                                <button class="bg-white text-primary-5 px-4 py-1 rounded-lg">Lihat lebih
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
                    <div class="relative rounded-lg text-white mb-12">
                        <img src="../../../assets/front/image/Bramara.jpg" class="rounded-xl z-0 relative h-full" alt="">
                        <div
                            class="absolute inset-x-0 -bottom-12 bg-primary-5 z-10  px-4 py-2 rounded-xl divide-y-2 divide-white">
                            <div class="flex justify-between py-2 items-center">
                                <div class="flex flex-col">
                                    <h2 class=" font-primary text-lg uppercase">Bramara</h2>
                                    <div class="flex gap-2 items-center">
                                        <i class="fa-solid fa-expand"></i>
                                        <p>Ukuran ruangan : 91 meter <sup>2</sup></p>
                                    </div>
                                </div>
                                <button class="bg-white text-primary-5 px-4 py-1 rounded-lg">Lihat lebih
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
                    <div class="relative rounded-lg text-white mb-12">
                        <img src="../../../assets/front/image/Panata.jpg" class="rounded-xl z-0 relative h-full" alt="">
                        <div
                            class="absolute inset-x-0 -bottom-12 bg-primary-5 z-10  px-4 py-2 rounded-xl divide-y-2 divide-white">
                            <div class="flex justify-between py-2 items-center">
                                <div class="flex flex-col">
                                    <h2 class=" font-primary text-lg uppercase">Panata</h2>
                                    <div class="flex gap-2 items-center">
                                        <i class="fa-solid fa-expand"></i>
                                        <p>Ukuran ruangan : 91 meter <sup>2</sup></p>
                                    </div>
                                </div>
                                <button class="bg-white text-primary-5 px-4 py-1 rounded-lg">Lihat lebih
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
                    <div class="relative rounded-lg text-white mb-12">
                        <img src="../../../assets/front/image/Karya.jpg" class="rounded-xl z-0 relative h-full" alt="">
                        <div
                            class="absolute inset-x-0 -bottom-12 bg-primary-5 z-10  px-4 py-2 rounded-xl divide-y-2 divide-white">
                            <div class="flex justify-between py-2 items-center">
                                <div class="flex flex-col">
                                    <h2 class=" font-primary text-lg uppercase">Karya</h2>
                                    <div class="flex gap-2 items-center">
                                        <i class="fa-solid fa-expand"></i>
                                        <p>Ukuran ruangan : 91 meter <sup>2</sup></p>
                                    </div>
                                </div>
                                <button class="bg-white text-primary-5 px-4 py-1 rounded-lg">Lihat lebih
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
                    <div class="relative rounded-lg text-white mb-12">
                        <img src="../../../assets/front/image/Arupadatu.jpg" class="rounded-xl z-0 relative h-full" alt="">
                        <div
                            class="absolute inset-x-0 -bottom-12 bg-primary-5 z-10  px-4 py-2 rounded-xl divide-y-2 divide-white">
                            <div class="flex justify-between py-2 items-center">
                                <div class="flex flex-col">
                                    <h2 class=" font-primary text-lg uppercase">Arupadatu</h2>
                                    <div class="flex gap-2 items-center">
                                        <i class="fa-solid fa-expand"></i>
                                        <p>Ukuran ruangan : 91 meter <sup>2</sup></p>
                                    </div>
                                </div>
                                <button class="bg-white text-primary-5 px-4 py-1 rounded-lg">Lihat lebih
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
                    <div class="relative rounded-lg text-white mb-12">
                        <img src="../../../assets/front/image/Nirmana.jpg" class="rounded-xl z-0 relative h-full" alt="">
                        <div
                            class="absolute inset-x-0 -bottom-12 bg-primary-5 z-10  px-4 py-2 rounded-xl divide-y-2 divide-white">
                            <div class="flex justify-between py-2 items-center">
                                <div class="flex flex-col">
                                    <h2 class=" font-primary text-lg uppercase">Nirmana</h2>
                                    <div class="flex gap-2 items-center">
                                        <i class="fa-solid fa-expand"></i>
                                        <p>Ukuran ruangan : 91 meter <sup>2</sup></p>
                                    </div>
                                </div>
                                <button class="bg-white text-primary-5 px-4 py-1 rounded-lg">Lihat lebih
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
                    <div class="relative rounded-lg text-white mb-12">
                        <img src="../../../assets/front/image/Nirwana.jpg" class="rounded-xl z-0 relative h-full" alt="">
                        <div
                            class="absolute inset-x-0 -bottom-12 bg-primary-5 z-10  px-4 py-2 rounded-xl divide-y-2 divide-white">
                            <div class="flex justify-between py-2 items-center">
                                <div class="flex flex-col">
                                    <h2 class=" font-primary text-lg uppercase">Nirwana</h2>
                                    <div class="flex gap-2 items-center">
                                        <i class="fa-solid fa-expand"></i>
                                        <p>Ukuran ruangan : 91 meter <sup>2</sup></p>
                                    </div>
                                </div>
                                <button class="bg-white text-primary-5 px-4 py-1 rounded-lg">Lihat lebih
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
                </div>
            </div>
        </section>
</div>
@endsection