@extends('template.front.main')
@section('content')
<div id="app" class="">
    <section id="hiro" class=" mb-6">
        <div class="container flex flex-col justify-center py-8">
            <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">PROMO
            </h2>
            <div class="flex flex-col divide-y-2 divide-primary-5 gap-6">
                <div class="grid grid-cols-2">
                    <div class="flex justify-start gap-2 items-center">
                        <div class="flex flex-col">
                            <h2 class="text-xl text-primary-5 mb-2 font-primary font-bold">
                            Daftar Member</h2>
                        </div>
                    </div>
                </div>
                <form action="{{ route('profil.updatePassword') }}" method="POST" id="updateForm">
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
                
                <div class="grid grid-cols-2 mt-8">
                    <div class="flex justify-start gap-2 items-center">
                        <button class="text-white bg-primary-5 bg-primary-1 py-2 px-4 rounded-md"
                        onclick="document.getElementById('updateForm').submit()" >Daftar Member</button>
                    </div>
                </div>
            </div></form>
        </div>
    </section>
</div>
@include('components.modal')
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        const btnDetails = document.querySelectorAll(".btn-detail");
        const lblKapasitas = document.getElementById('lbl-kapasitas');
        btnDetails.forEach(btn => {
            btn.addEventListener('click', function(evt) {
                lblKapasitas.innerHTML = evt.target.getAttribute('data-kapasitas') + " Orang";
                document.getElementById('lbl-panjang').innerHTML = evt.target.getAttribute('data-panjang');
                document.getElementById('lbl-lebar').innerHTML = evt.target.getAttribute('data-lebar');
                document.getElementById('lbl-harga').innerHTML = evt.target.getAttribute('data-harga');
                document.getElementById('lbl-nama').innerHTML = evt.target.getAttribute('data-nama');
                var path =  "{{ url('/assets/front/image/')}}/";
                document.getElementById('gambarModal').setAttribute('src', path + evt.target.getAttribute('data-image'));
                document.querySelector(".deskripsi").innerHTML = evt.target.getAttribute("data-deskripsi");
                // modal.classList.remove('hidden'); // Show modal
            });
        });
    });
</script>
@endsection