@extends('template.front.main')
@section('content')
<div id="app" class="bg-primary-2">
    <section id="hiro" class=" mb-6">
        <div class="container flex flex-col justify-center py-8">
            <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Profile
            </h2>
            <div class="flex flex-col divide-y-2 divide-primary-5 gap-6">
                <div class="grid grid-cols-2">
                    <div class="flex justify-start gap-2 items-center">
                        <img src="../assets/Dana.png" class="rounded-full" width="100px" alt="">
                        <div class="flex flex-col">
                            <h2 class="text-xl text-primary-5 mb-2">Ria Ricis</h2>
                            <p>08911111111</p>
                            <p>Riaricis2gmai.com</p>
                            <p>Bintaro, Jakarta Selatan</p>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 items-center">
                        <button class="text-primary-5 bg-primary-1 p-2 rounded-md">Unggah Foto Profille
                            Baru</button>
                        <button class="text-white bg-primary-5 p-2 rounded-md">Hapus Foto Profile</button>
                    </div>
                </div>
                <div class="flex flex-col gap-2 py-6">
                    <label for="" class="text-primary-5">First Name</label>
                    <input type="text"
                        class="bg-primary-1 rounded-md p-2 border border-primary-5 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex flex-col gap-2">
                            <label for="" class="text-primary-5">Email</label>
                            <div class="relative">
                                <input type="email" placeholder="Email"
                                    class="w-full pl-10 pr-4 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-primary-5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="" class="text-primary-5">Telepon</label>
                            <div class="relative">
                                <input type="text"
                                    class="w-full pl-10 pr-4 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fa-solid fa-phone h-5 w-5 text-primary-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="" class="text-primary-5">Alamat</label>
                    <div class="relative">
                        <input type="text"
                            class="w-full pl-10 pr-4 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-location-dot h-5 w-5 text-primary-5"></i>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2 py-6">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex flex-col gap-2">
                            <label for="" class="text-primary-5">Password</label>
                            <div class="relative">
                                <input type="password"
                                    class="w-full pl-10 pr-4 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <ii class="fa-solid fa-key h-5 w-5 text-primary-5"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="" class="text-primary-5">Password Baru</label>
                            <div class="relative">
                                <input type="password"
                                    class="w-full pl-10 pr-4 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fa-solid fa-key h-5 w-5 text-primary-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="" class="text-primary-5">Konfirmasi Password Baru</label>
                    <div class="relative">
                        <input type="password"
                            class="w-full pl-10 pr-4 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-key h-5 w-5 text-primary-5"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 mt-8">
                <div class="flex justify-start gap-2 items-center">
                    <button class="text-primary-5 bg-primary-1 py-2 px-4 rounded-md">Simpan Perubahan</button>
                    <button class="text-white bg-primary-5 py-2 px-6 rounded-md">Hapus</button>
                </div>
                <div class="flex justify-end gap-2 items-center">
                    <button class="text-primary-5  bg-primary-2 border border-primary-5 py-2 px-6 rounded-2xl">SignOut <i class="fa-solid fa-right-from-bracket"></i></button>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection