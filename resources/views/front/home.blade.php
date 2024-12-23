@extends('template.front.main')
@section('content')
<div id="app"> 
    <section id="hiro" class="relative top-0 w-full bg-center bg-cover"
        style="background-image: url('../../../assets/front/image/nin1.jpg'); margin-top: 0;">
        <div class="absolute inset-0 opacity-50 bg-primary-4"></div>
        <div
            class="container relative flex items-center justify-center min-h-svh h-full px-4 mx-auto text-center text-primary-5 z-51">
             <form method="POST" action="{{ route('room.search') }}" class="w-3/4 justify-center">
                @csrf 
                <div
                    class="flex w-3/4 items-center justify-center gap-2 p-2 bg-primary-1/90 backdrop-blur-sm rounded-lg shadow-sm border">
                    <div class="relative flex-1">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" placeholder="Cari berdasarkan Nama Ruangan" di="cari" name="cari"
                            class="w-full pl-9 py-2 bg-transparent border-0 focus:outline-none focus:ring-0 form-control">
                    </div>
                    <div class="relative flex-1">
                        <i class="far fa-calendar absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" id="date-range" placeholder="Tanggal Awal - Tanggal Akhir"
                            di="tanggal" name="tanggal"
                            class="w-full pl-9 py-2 bg-transparent border-0 focus:outline-none focus:ring-0 form-control">
                    </div>
                    <button class="bg-primary-5 hover:bg-red-700 text-white px-8 py-2 rounded">
                        Cari
                    </button>
                </div>
           </form> 
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
                                <button class="bg-primary-2 openModal text-primary-5 px-4 py-1 rounded-lg btn-detail" 
                                data-id="{{$Ruangan->id}}"
                                data-kapasitas="{{$Ruangan->kapasitas}}"
                                data-panjang="{{$Ruangan->panjang_ruangan}}"
                                data-lebar="{{$Ruangan->lebar_ruangan}}"
                                data-harga="{{$Ruangan->harga}}"
                                data-deskripsi="{{$Ruangan->deskripsi}}"
                                data-image="{{$Ruangan->image}}"
                                data-nama="{{$Ruangan->nama_ruangan}}"
                                >Lihat lebih
                                    lengkap</button>
                            </div>
                            <div class="flex justify-between py-2 items-center">
                                <h2 class=" font-primary text-lg uppercase">IDR {{$Ruangan->harga}}</h2>
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
                        @foreach($informasi as $i)
                        <div class="rounded-lg w-1/4 flex-shrink-0 hover:scale-95 transition-transform duration-300">
                            <img src="../../../assets/front/image/{{$i->image}}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr("#date-range", {
            mode: "range",
            dateFormat: "d/m/Y",
            placeholder: "Tanggal Awal - Tanggal Akhir",
            onClose: function (selectedDates, dateStr, instance) {
                if (selectedDates.length === 2) {
                    console.log("Selected date range:", dateStr);
                }
            }
        });
    });
</script>
@endsection