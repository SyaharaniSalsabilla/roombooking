@extends('template.front.main')
@section('content')
<div id="app" class="bg-primary-2">
    <section id="hiro" class=" mb-6">
        <div class="container flex flex-col justify-center py-8">
            <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Ruangan
            </h2>
            <div class="grid grid-cols-2 gap-6 py-2">
                <div class="flex flex-col gap-6">
                    @if($Ruangan)
                    @foreach($Ruangan as $Ruangan)
                        <div class="relative rounded-lg text-white mb-12">
                            <img src="{{ url('/assets/front/image/'.$Ruangan->image) }}" class="rounded-xl z-0 relative h-full" alt="">
                            <div
                                class="absolute inset-x-0 -bottom-12 bg-primary-5 z-10  px-4 py-2 rounded-xl divide-y-2 divide-white">
                                <div class="flex justify-between py-2 items-center">
                                    <div class="flex flex-col">
                                        <h2 class=" font-primary text-lg uppercase">{{$Ruangan->nama_ruangan}}</h2>
                                        <div class="flex gap-2 items-center">
                                            <i class="fa-solid fa-expand"></i>
                                            <p>Ukuran ruangan : {{$Ruangan->panjang_ruangan}} X {{$Ruangan->lebar_ruangan}} meter</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-between py-2 items-center">
                                    
                                    <button class="bg-primary-2 openModal text-primary-5 px-4 py-1 rounded-lg btn-detail" 
                                data-id="{{$Ruangan->id}}"
                                data-kapasitas="{{$Ruangan->kapasitas}}"
                                data-panjang="{{$Ruangan->panjang_ruangan}}"
                                data-lebar="{{$Ruangan->lebar_ruangan}}"
                                data-harga="{{$Ruangan->harga}}"
                                data-deskripsi="{{$Ruangan->deskripsi}}"
                                data-image="{{$Ruangan->image}}"
                                data-nama="{{$Ruangan->nama_ruangan}}"
                                >Lebih Lengkap</button>
                                    </div>
                                </div>
                                <div class="flex justify-between py-2 items-center">
                                    <div class="flex gap-2 items-center">
                                        <h2 class=" font-primary text-lg uppercase">IDR {{$Ruangan->harga}}</h2>
                                    </div>
                                    <form id="pesanan" action="{{route('transaksi.pesan',[12,1])}}" method="POST">@csrf</form>
                                    <a href="{{route('pesan1', $Ruangan->id)}}" class="hover:text-red-500">
                                        <button class="bg-primary-2 text-primary-5 px-4 py-1 rounded-lg">Pesan Sekarang</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
                <form method="POST" action="{{ route('room.search') }}" class="justify-center ">
                    <div>
                        @csrf 
                        <div class="w-full bg-primary-1 rounded-xl p-8 h-fit flex flex-col gap-2">
                            <label for="" class="text-xl font-bold">Nama Ruangan</label>
                            <input type="text" placeholder="Cari berdasarkan Nama/Ruangan" name="cari" value="{{$cari}}"
                                class="w-full border border-primary-5 p-2 bg-transparent rounded-lg text-center">
                            <label for="" class="text-xl font-bold">Tanggal Awal - Tanggal Akhir</label>
                            <input type="text" id="date-range" placeholder="Tanggal Awal - Tanggal Akhir" value="{{$dates}}" name="tanggal"
                                class="w-full border border-primary-5 p-2 bg-transparent rounded-lg text-center">
                            <button class="text-center w-full rounded-lg bg-primary-5 hover:bg-red-700 mt-6 py-2 text-white text-xl font-semibold">Cari</button>
                        </div>
                    </div>
                </form>
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