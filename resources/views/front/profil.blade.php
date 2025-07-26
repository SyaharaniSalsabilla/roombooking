@extends('template.front.main')
@section('content')
<div id="app" class="">
    <section id="hiro" class=" mb-6">
        <div class="container flex flex-col justify-center py-8">
            <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Profil
            </h2>
            <div class="flex flex-col divide-y-2 divide-primary-5 gap-6">
                <div class="grid grid-cols-2">
                    <div class="flex justify-start gap-2 items-center">
                        <div class="flex flex-col">
                            <h2 class="text-xl text-primary-5 mb-2 font-primary font-bold">
                            {{Auth::user()->profile->nama ?? ''}}</h2>
                            <p>{{Auth::user()->profile->telepon ?? ''}}</p>
                            <p>{{Auth::user()->profile->email ?? ''}}</p>
                            <p>{{Auth::user()->profile->alamat ?? ''}}</p>
                        </div>
                    </div>
                </div>
                <form action="{{ route('profil.updateProfile') }}" method="POST" id="updateForm">
                    @csrf
                <div class="flex flex-col gap-2 py-6">
                    <label for="" class="text-primary-5">Nama</label>
                    <input type="text" name="nama"
                        class="bg-primary-1 rounded-md p-2 text-primary-5 border border-primary-5 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{Auth::user()->profile->nama ?? ''}}">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex flex-col gap-2">
                            <label for="" class="text-primary-5">Email</label>
                            <div class="relative">
                                <input type="email" placeholder="Email" name="email"
                                    class="w-full pl-10 pr-4 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                    value="{{Auth::user()->profile->email ?? ''}}">
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
                                <input type="text" name="telepon"
                                    class="w-full pl-10 pr-4 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                    value="{{Auth::user()->profile->telepon ?? ''}}">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fa-solid fa-phone h-5 w-5 text-primary-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="" class="text-primary-5">Alamat</label>
                    <div class="relative">
                        <input type="text" name="alamat"
                            class="w-full pl-10 pr-4 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                            value="{{Auth::user()->profile->alamat ?? ''}}">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-location-dot h-5 w-5 text-primary-5"></i>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2 py-6">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex flex-col gap-2">
                            <label for="" class="text-primary-5">Kata Sandi</label>
                            <div class="relative">
                                <input type="password" name="password" value="{{Auth::user()->profile->password ?? ''}}" disabled
                                    class="w-full pl-10 pr-4 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <ii class="fa-solid fa-key h-5 w-5 text-primary-5"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="password_baru" class="text-primary-5">Kata Sandi Baru</label>
                            <div class="relative">
                                <input type="password" name="password_baru" placeholder="Kata Sandi Perubahan"
                                    class="w-full pl-10 pr-4 py-3 bg-primary-1 border 
                                    border-primary-5  rounded-md text-primary-5 placeholder-gray-500 
                                    focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fa-solid fa-key h-5 w-5 text-primary-5"></i>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div></form>
            <div class="grid grid-cols-2 mt-8">
                <div class="flex justify-start gap-2 items-center">
                    <button class="text-white bg-primary-5 bg-primary-1 py-2 px-4 rounded-md"
                    onclick="document.getElementById('updateForm').submit()" >Simpan Perubahan</button>
                </div>
                
                <form class="flex justify-end gap-2 items-center" action="{{ route('logout') }}" method="GET">
                    @csrf
                    <button class="text-primary-5  bg-primary-2 border border-primary-5 py-2 px-6 rounded-2xl">Logout <i class="fa-solid fa-right-from-bracket"></i></button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
<script>     
document.addEventListener('DOMContentLoaded', function(){
    document.getElementsByClassName('password_baru').value = ''
});

document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('profileDropdownBtn');
    const menu = document.getElementById('profileDropdown');

    if (btn && menu) {
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            menu.classList.toggle('hidden');
        });

        document.addEventListener('click', function () {
            menu.classList.add('hidden');
        });
    }
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btn = document.getElementById('profileDropdownBtn');
        const menu = document.getElementById('profileDropdown');

        btn.addEventListener('click', function () {
            menu.classList.toggle('hidden');
        });

        // Optional: Klik di luar untuk menutup
        document.addEventListener('click', function (e) {
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    });
</script>
@endsection