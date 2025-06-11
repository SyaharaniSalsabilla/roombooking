@extends('template.front.main')
@section('content')
<div id="app" class="bg-primary-2">
        <section id="hiro" class=" mb-6">
            <div class="container flex flex-col justify-center py-8">
                <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Pesan
                    Ruangan
                </h2>
                <form method="GET" id="prev" action="{{route('home')}}">
                </form>
                <div class="grid grid-cols-3 gap-12">
                    <div class="flex flex-col gap-2 col-span-2 font-secondary text-justify">
                        <p>Langkah 4 dari 4</p>
                        <h2 class="w-full font-primary font-semibold text-3xl text-primary-5 mb-2">
                            Selesaikan Pembayaran
                        </h2>
                    </div>
                    <div class="col-span-1">
                        <div class="flex flex-col mb-4">
                                <button class="text-primary-2 bg-primary-5 rounded-xl py-2 px-4 text-center"
                                onclick="document.getElementById('prev').submit()">Kembali</button>
                        </div>
                    </div>
                </div>
                <div class="bg-primary-1 rounded-lg grid grid-cols-2 divide-x-2 divide-primary-5 p-4">
                    <div class="flex flex-col p-4 gap-2">
                        <h2 class="font-bold text-2xl">PENTING!</h2>
                        <p class="text-base text-gray-700">Mohon transfer sesuai jumlah uang yang tertera</p>
                        <h2 class="font-bold text-2xl">Total</h2>
                        <p class="text-gray-700 text-base">IDR {{number_format($totalHarga,2,',','.')}}</p>
                    </div>

                    <div class="flex flex-col p-4 gap-2">
                        <p class="text-base text-gray-700">Harap selesaikan pembayaran sebelum</p>
                        <h2 class="font-bold text-2xl">2022-12-02 11:46 WIB</h2>
                        <div class="flex items-center gap-2">
                            <p class="text-base text-gray-700">Kode Bank </p>
                        <h2 class="font-bold text-2xl">{{$kode}}</h2>
                        </div>
                        <p class="text-gray-700 text-base">Nomer Rekening</p>
                        <h2 class="font-bold text-2xl">6030571906</h2>
                    </div>
                    <button id="pay-button">Bayar Demo</button>
                </div>
            </div>
        </section>

    </div>
@endsection
@section('script')
<script>
    document.getElementById('prev').onsubmit = function() {
        // Menambahkan nilai dinamis ke input hidden
        document.getElementById('data_tambahan').value = JSON.stringify(tambahanData);
        document.getElementById('data_total').value = totalHarga;
        document.getElementById('data_tgl_mulai').value = tglMulai;
        document.getElementById('data_tgl_sampai').value = tglSampai;
        document.getElementById('data_note').value = noteData;
    };
</script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-2l8b5oqyv0apvQeQ"></script>
<script>
  var payButton = document.getElementById('pay-button');
  
  // Snap token demo yang dibuat untuk testing, token ini expire, biasanya kamu harus generate sendiri dari server
  var demoSnapToken = 'dummy-snap-token-untuk-demo'; // <-- ini contoh, harus diganti token asli kalau mau bayar beneran

  payButton.addEventListener('click', function() {
    snap.pay(demoSnapToken, {
      onSuccess: function(result){
        alert('Pembayaran berhasil!');
        console.log(result);
      },
      onPending: function(result){
        alert('Pembayaran pending!');
        console.log(result);
      },
      onError: function(result){
        alert('Pembayaran gagal!');
        console.log(result);
      }
    });
  });
</script>

@endsection