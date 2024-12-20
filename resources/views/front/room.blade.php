@extends('template.front.main')
@section('content')
<div id="app" class="bg-primary-2">
        <section id="hiro" class=" mb-6">
            <div class="container flex flex-col justify-center py-8">
                <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Ruangan
                </h2>
                <div class="grid grid-cols-2 gap-6">
                    @foreach($rooms as $room)
                        <div class="relative rounded-lg text-white mb-12">
                            <img src="{{ url('/assets/front/image/'.$room->image) }}" class="rounded-xl z-0 relative h-full" alt="">
                            <div
                                class="absolute inset-x-0 -bottom-12 bg-primary-5 z-10  px-4 py-2 rounded-xl divide-y-2 divide-white">
                                <div class="flex justify-between py-2 items-center">
                                    <div class="flex flex-col">
                                        <h2 class=" font-primary text-lg uppercase">{{$room->nama_ruangan}}</h2>
                                        <div class="flex gap-2 items-center">
                                            <i class="fa-solid fa-expand"></i>
                                            <p>Ukuran ruangan : {{$room->panjang_ruangan}} X {{$room->lebar_ruangan}} meter</p>
                                        </div>
                                    </div>
                                    <button class="bg-white text-primary-5 px-4 py-1 rounded-lg">Lihat lebih
                                        lengkap</button>
                                </div>
                                <div class="flex justify-between py-2 items-center">
                                    <div class="flex gap-2 items-center">
                                        <h2 class=" font-primary text-lg uppercase">IDR XXXXX</h2>
                                    </div>
                                    <form id="pesanan" action="{{route('transaksi.pesan',[12,1])}}" method="POST">@csrf</form>
                                    <button class="bg-primary-2 text-primary-5 px-4 py-1 rounded-lg" onClick="document.getElementById('pesanan').submit()">Pesan Sekarang</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
</div>
@endsection