@extends('template.front.main')
@section('content')
<section id="hiro" class=" mb-6">
            <div class="container flex flex-col justify-center py-8">
                <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Pesan
                    Ruangan
                </h2>
                <div class="grid grid-cols-3 gap-12">
                    <div class="flex flex-col gap-2 col-span-2 font-secondary text-justify">
                        <p>Langkah 3 dari 4</p>
                        <h2 class="w-full font-primary font-semibold text-3xl text-primary-5 mb-2">
                            Buat akun atau masuk
                        </h2>
                        <div class="flex justify-center items-center bg-primary-1 rounded-lg">
                            <div class="w-full max-w-md p-6 space-y-2">
                                <form action="{{ route('login.email') }}" id="formLogin" method="GET"></form>
                                <button type="button" onclick="document.getElementById('formLogin').submit()"
                                    class="w-full bg-primary-5 text-white py-3 px-4 rounded-md font-medium hover:bg-red-500 transition-colors">
                                    Masuk dengan Email
                                </button>

                                <p class="text-gray-400 text-center text-xs">Belum Punya Akun?</p>
                                <!-- Register Link -->
                                <div class="text-center">
                                    <a href="register.html"
                                        class="text-primary-5 hover:text-red-700 text-sm font-medium">
                                        Daftar sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="flex flex-col mb-4">
                            <button class="text-primary-2 bg-primary-5 rounded-xl py-2 px-4">Kembali</button>
                        </div>
                        <div class="flex flex-col divide-y-2 divide-primary-5 bg-primary-1 rounded-lg">
                            <div class="flex justify-center items-center p-2">
                                <img src="../../../assets/front/image/Anindhaloka Logo.png" width="60px" alt="">
                                <h2 class="font-primary font-semibold uppercase text-xl text-primary-5">Nin Space
                                </h2>
                            </div>
                            <span class="divider text-center " >
                                <div class="p-2">
                                    <label id="lbl_tanggal_awal" class="font-semibold">{{$tgl_mulai}}</label> 
                                    <span class="text-primary-5">to</span>
                                    <label id="lbl_tanggal_akhir" class="font-semibold">{{ $tgl_selesai}}</label>
                                </div>
                            </span>

                            @if($ruangans)
                                <div class="grid grid-cols-2 items-center py-1 space-x-between">
                                @foreach($ruangans as $r)
                                    <p class="text-primary-5 text-left text-2xl font-semibold px-4 py-1">{{ $r['nama'] }}</p>
                                    <p class="text-right px-4">IDR {{ number_format($r['harga'], 0, ',', '.') }}</p>
                                @endforeach
                                </div>
                            @endif
                            @if($tambahans)
                                <div class="items-center py-2 space-y-2 px-4 div-na">
                                        @foreach($tambahans as $item)
                                        <div class="item-summary flex justify-between border-b py-1 pr-4">
                                            <p class="item-name text-primary-5 text-left font-semibold">{{ $item['nama'] }}</p>
                                            <p class="item-quantity text-sm font-semibold"><label id="jumlah-tambahan">{{ $item['jumlah'] }}</label></p>
                                            <p class="item-subtotal text-right px-0">IDR <label id="harga-tambahan">{{ number_format($item['subtotal'], 0, ',', '.') }}</label></p>
                                        </div>
                                        @endforeach
                                </div>
                            @endif
                            <div class="grid grid-cols-2 items-center py-2">
                                <h2 class="text-primary-5 text-left text-2xl font-semibold p-4">Total</h2>
                                <p class="text-right px-4">IDR {{ number_format($totalHarga, 0, ',', '.') }}</p>
                            </div>
                            <form method="POST" id="orderForm" action="{{route('pesan3')}}">
                                @csrf

                                <input type="hidden" name="data_ruangan" id="data_ruangan" value="{{ json_encode($ruangans)}}"> 
                                <input type="hidden" name="data_tambahan" id="data_tambahan" value="{{json_encode($tambahans)}}">
                                <input type="hidden" name="data_total" id="data_total" value="{{$totalHarga}}">  

                                <input type="hidden" name="data_tgl_mulai" id="data_tgl_mulai" value="{{$tgl_mulai}}">  
                                <input type="hidden" name="data_tgl_sampai" id="data_tgl_sampai" value="{{$tgl_selesai}}">
                                <a href="{{route('pesan3')}}" class="hover:text-red-500">   
                                    <div class="grid grid-cols-1 items-center p-4">
                                        <button id="btn_submit" class="text-primary-2 bg-primary-5 rounded-xl py-2 px-4">Lanjutkan</button>
                                    </div>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</section>
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        const btn = document.querySelector('#btn_submit');

        btn.addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('orderForm').submit();
        });
    });

</script>
@endsection