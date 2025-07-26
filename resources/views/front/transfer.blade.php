@extends('template.front.main')
@section('content')
<section id="hiro" class=" mb-6">
            <div class="container flex flex-col justify-center py-8">
                <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Pesan
                    Ruangan
                </h2>
                <div class="grid grid-cols-3 gap-12 text-center">
                    <div class="col-span-1"></div>
                    <div class="col-span-1">
                        <form method="POST" id="prev" action="{{route('pesan3')}}">
                            @csrf
                            <input type="hidden" name="data_ruangan" id="data_ruangan" value="{{ json_encode($ruangans)}}"> 
                            <input type="hidden" name="data_tambahan" id="data_tambahan" value="{{json_encode($tambahans)}}">
                            <input type="hidden" name="data_total" id="data_total" value="{{$totalHarga}}">  

                            <input type="hidden" name="data_tgl_mulai" id="data_tgl_mulai" value="{{$tgl_mulai}}">  
                            <input type="hidden" name="data_tgl_sampai" id="data_tgl_sampai" value="{{$tgl_selesai}}">
                            <input type="hidden" name="data_note" id="data_note" value="{{$notes}}">
                        </form>
                        <!-- <div class="flex flex-col mb-4">
                            <button class="text-primary-2 bg-primary-5 rounded-xl py-2 px-4"
                            onclick="document.getElementById('prev').submit()">Kembali</button>
                        </div> -->
                        <div class="flex flex-col divide-y-2 divide-primary-5 bg-primary-1 rounded-lg">
                            <div class="flex justify-center items-center p-2">
                                <img src="../../../assets/front/image/Anindhaloka Logo.png" width="60px" alt="">
                                <h2 class="font-primary font-semibold uppercase text-xl text-primary-5">Nin Space
                                </h2>
                            </div>
                            <span class="divider text-center " >
                                <div class="p-2">
                                    <h2 class="text-primary-5 text-2xl font-semibold text-center">Rincian Pesanan</h2>
                                </div>
                            </span>
                            <span class="divider text-start py-2 px-2" >
                                <div class="p-2">
                                    <label class="text-primary-5 text-left px-1 py-1">Tanggal : </label>
                                    <label id="lbl_tanggal_awal" class="font-semibold">{{str_replace(['&amp;quot;', '"'], '',$tgl_mulai)}}</label> 
                                    <span class="text-primary-5">sampai</span>
                                    <label id="lbl_tanggal_akhir" class="font-semibold">{{ str_replace(['&quot;', '"'], '',$tgl_selesai)}}</label>
                                </div>
                            </span>

                            @if($ruangans)
                                <div class="grid grid-cols-2 items-left py-1 space-x-between">
                                @foreach($ruangans as $r)
                                    <p class="text-primary-5 text-left text-2xl px-4 py-1">{{ $r['nama'] }}</p>
                                    <p class="text-right px-8 mt-2 ">IDR {{ number_format($r['subtotal'], 0, ',', '.') }}</p>
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
                            <!-- <div class="grid grid-cols-2 items-center py-1">
                                <h2 class="text-primary-5 text-left text-2xl font-semibold p-4">Metode</h2>
                                <p class="text-right px-4" id="lbl-metode">-</p>
                            </div> -->
                            <div class="grid grid-cols-2 items-center py-2">
                                <h2 class="text-primary-5 text-left text-2xl font-semibold p-4">Total</h2>
                                <p class="text-right px-8">IDR {{ number_format($totalHarga, 0, ',', '.') }}</p>
                            </div>
                            <div class="items-center py-2 space-y-2 px-4 div-na">
                                <div class="item-summary flex justify-between border-b py-1 pr-4">
                                    <p class="item-name text-primary-5 text-left font-semibold">
                                        <span class="item-name text-primary-5 text-left font-semibold">
                                            Notes: 
                                        </span>{{ $notes }}
                                    </p>
                                </div>
                            </div>
                            <form id="orderForm" method="POST">
                                @csrf
                                <input type="hidden" name="data_ruangan" id="data_ruangan" value="{{ json_encode($ruangans)}}"> 
                                <input type="hidden" name="data_tambahan" id="data_tambahan" value="{{json_encode($tambahans)}}">
                                <input type="hidden" name="data_total" id="data_total" value="{{$totalHarga}}">  

                                <input type="hidden" name="data_tgl_mulai" id="data_tgl_mulai" value="{{$tgl_mulai}}">  
                                <input type="hidden" name="data_tgl_sampai" id="data_tgl_sampai" value="{{$tgl_selesai}}">
                                <input type="hidden" name="data_note" id="data_note" value="{{$notes}}"> 
                                <input type="hidden" name="data_metode_bayar" id="data_metode_bayar">
                                <input type="hidden" name="data_kode" id="data_kode">
                                
                            </form>
                            <a class="hover:text-red-500">   
                                    <div class="grid grid-cols-1 items-center p-4">
                                        
                                    </div>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
</section>
@endsection
@section('script')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-OAlSgtNpssw0Xcba"></script>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        const btn = document.querySelector('#btn_submit');
        var ruangans = @json($ruangans);
        var tambahans = @json($tambahans);
        var totalHarga = @json($totalHarga);
        var tgl_mulai = "{{str_replace(['&amp;quot;', '"'], '',$tgl_mulai)}}";
        var tgl_selesai = "{{$tgl_selesai}}";
        var note = "{{$notes}}" ;
        var kode = '';
        
        btn.addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('data_ruangan').value = JSON.stringify(ruangans);
                document.getElementById('data_tambahan').value = JSON.stringify(tambahans);
                document.getElementById('data_tgl_mulai').value = JSON.stringify(tgl_mulai);
                document.getElementById('data_tgl_sampai').value = JSON.stringify(tgl_selesai);
                document.getElementById('data_total').value = totalHarga;
                document.getElementById('data_note').value  = note;
                document.getElementById('data_kode').value  = kode;
                
                document.getElementById('orderForm').setAttribute('action', "{{route('transfer')}}")
        });

        const btnMetode = document.querySelectorAll('.metode');
        btnMetode.forEach(metode =>{
            metode.addEventListener('click', function(){
                var nm = this.getAttribute('data-name');
                kode = this.getAttribute('data-kode');
                document.getElementById('lbl-metode').innerHTML = nm;
                document.getElementById('data_metode_bayar').value  = nm;
            });
        });
    });

</script>
<script>
document.getElementById('btn_submit').addEventListener('click', function (e) {
    e.preventDefault();
    // PReparing data
    const btn = document.querySelector('#btn_submit');
    var ruangans = @json($ruangans);
    var tambahans = @json($tambahans);
    var totalHarga = @json($totalHarga);
    var tgl_mulai = "{{str_replace(['&amp;quot;', '"'], '',$tgl_mulai)}}";
    var tgl_selesai = "{{$tgl_selesai}}";
    var note = "{{$notes}}" ;
    var kode = '';
    
    btn.addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('data_ruangan').value = JSON.stringify(ruangans);
        document.getElementById('data_tambahan').value = JSON.stringify(tambahans);
        document.getElementById('data_tgl_mulai').value = JSON.stringify(tgl_mulai);
        document.getElementById('data_tgl_sampai').value = JSON.stringify(tgl_selesai);
        document.getElementById('data_total').value = totalHarga;
        document.getElementById('data_note').value  = note;
        document.getElementById('data_kode').value  = kode;
        
        document.getElementById('orderForm').setAttribute('action', "{{route('transfer')}}")
        document.getElementById('orderForm').setAttribute('method', "POST")
    });

    const btnMetode = document.querySelectorAll('.metode');
    btnMetode.forEach(metode =>{
        metode.addEventListener('click', function(){
            var nm = this.getAttribute('data-name');
            kode = this.getAttribute('data-kode');
            document.getElementById('lbl-metode').innerHTML = nm;
            document.getElementById('data_metode_bayar').value  = nm;
        });
        });

    // Kirim permintaan ke backend untuk dapatkan snapToken
    fetch("{{ route('snap.token') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            total: document.getElementById("data_total").value,
            req_for:'token'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.snap_token) {
            window.snap.pay(data.snap_token, {
                onSuccess: function(result){
                    // Tambahkan kode transaksi ke form sebelum submit
                    document.getElementById("data_kode").value = result.order_id;
                    document.getElementById("data_metode_bayar").value = "midtrans";
                    
                    // Submit form setelah pembayaran berhasil
                    document.getElementById("orderForm").submit();
                    console.log("success");
                },
                onPending: function(result){
                    alert("Menunggu pembayaran selesai...");
                },
                onError: function(result){
                    alert("Terjadi kesalahan saat pembayaran.");
                    console.log(result);
                },
                onClose: function(){
                    alert("Pembayaran dibatalkan.");
                }
            });
        } else {
            alert("Gagal mendapatkan Snap Token.");
        }
    });
});
</script>
@endsection