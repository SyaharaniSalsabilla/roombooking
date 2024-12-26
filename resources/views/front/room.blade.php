@extends('template.front.main')
@section('content')
<div id="app" class="bg-primary-2">
    <section id="hiro" class=" mb-6">
        <div class="container flex flex-col justify-center py-8">
            <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Ruangan
            </h2>
            <div class="grid grid-cols-2 gap-6">
                @foreach($rooms as $Ruangan)
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
                                    data-harga="{{ number_format($Ruangan->harga, 0, ',', '.') }}"
                                    data-deskripsi="{{$Ruangan->deskripsi}}"
                                    data-image="{{$Ruangan->image}}"
                                    data-nama="{{$Ruangan->nama_ruangan}}"
                                    >Lebih Lengkap</button>
                                </div>
                            </div>
                            <div class="flex justify-between py-2 items-center">
                                <div class="flex gap-2 items-center">
                                    <h2 class=" font-primary text-lg uppercase">IDR {{ number_format($Ruangan->harga, 0, ',', '.') }}</h2>
                                </div>
                                <form id="pesanan" action="{{route('transaksi.pesan',[12,1])}}" method="POST">@csrf</form>
                                <a href="{{route('pesan1')}}" class="hover:text-red-500">
                                    <button class="bg-primary-2 text-primary-5 px-4 py-1 rounded-lg">Pesan Sekarang</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
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
@endsection