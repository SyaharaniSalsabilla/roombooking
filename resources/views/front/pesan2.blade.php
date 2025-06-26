@extends('template.front.main')
@section('content')
<section id="hiro" class=" mb-6">
            <div class="container flex flex-col justify-center py-8">
                <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Pesan
                    Ruangan
                </h2>
                <div class="grid grid-cols-3 gap-12">
                    <div class="flex flex-col gap-2 col-span-2 font-secondary text-justify">
                        <p>Langkah 2 dari 4</p>
                        <h2 class="w-full font-primary font-semibold text-3xl text-primary-5 mb-2">
                            Pilih Waktu Awal Sewa
                        </h2>
                        <div class="grid grid-cols-2 gap-3 mb-2">
                            <input type="date" placeholder="" id="input-mulai" required
                                class="w-full text -center px-3 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">

                            <input type="time" placeholder="" id="jam-mulai" required
                                class="w-full text-center px-3 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            <button class="text-primary-1 bg-primary-5 rounded-xl py-2 px-4" id="mulai-ok" style="display:none">OK</button>
                        </div>
                        <span class="text-danger text-primary-5"> {{ $errors->has('tgl_mulai') ? $errors->first('tgl_mulai') : '' }}</span>

                        <h2 class="w-full font-primary font-semibold text-3xl text-primary-5 mb-2">
                            Pilih Waktu Akhir Sewa
                        </h2>
                        <div class="grid grid-cols-2 gap-3 mb-2">
                            <input type="date" placeholder="" id="input-sampai" required
                                class="w-full text -center px-3 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">

                            <input type="time" placeholder="" id="jam-sampai" required
                                class="w-full text-center px-3 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            <button class="text-primary-1 bg-primary-5 rounded-xl py-2 px-4" id="sampai-ok" style="display:none">OK</button>
                        </div>
                        <span class="text-danger text-primary-5">{{ $errors->has('tgl_selesai') ? $errors->first('tgl_selesai') : ''}}</span>
                        <span class="text-danger text-primary-5">{{ $errors->has('message') ? $errors->first('message') : ''}}</span>
                    </div>
                    <div class="col-span-1">
                        <div class="flex flex-col mb-4">
                            <a href="{{ route('pesan1',$pesanan['id']) }}" class="text-primary-2 bg-primary-5 rounded-xl py-2 px-4 text-center">Kembali</a>
                        </div>
                        <div class="flex flex-col divide-y-2 divide-primary-5 bg-primary-1 rounded-lg">
                            <div class="flex justify-center items-center p-2">
                                <img src="../../../assets/front/image/Anindhaloka Logo.png" width="60px" alt="">
                                <h2 class="font-primary font-semibold uppercase text-xl text-primary-5">Nin Space
                                </h2>
                            </div>

                            <span class="divider text-center " >
                                <div class="p-2">
                                    <label id="lbl_tanggal_awal" class="font-semibold">Tanggal Awal</label> 
                                    <span class="text-primary-5">sampai</span>
                                    <label id="lbl_tanggal_akhir" class="font-semibold">Tanggal Akhir</label>
                                </div>
                            </span>

                            @if($ruangan)
                                <div class="grid grid-cols-2 items-center py-1 space-x-between">
                                @foreach($ruangan as $r)
                                    <p class="text-primary-5 text-left text-2xl font-semibold px-4 py-1">{{ $r['nama'] }}</p>
                                    <p class="text-right px-4 harga-ruangan" data-id="{{ $r['id'] }}" data-harga="{{ $r['harga'] }}">IDR <span class="harga-ruangan-value">{{ number_format($r['harga'], 0, ',', '.') }}</span></p>
                                @endforeach
                                </div>
                            @endif
                            @if($itemTambahan)
                                <div class="items-center py-2 space-y-2 px-4 div-na">
                                        @foreach($itemTambahan as $item)
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
                               <p class="text-right px-4">IDR <span id="label-total-harga">{{ number_format($totalHarga, 0, ',', '.') }}</span></p>
                            </div>
                            <form method="POST" id="orderForm" action="{{ Auth::check() ? route('pesan3') : route('pesan3.login')}}">
                                @csrf
                                <input type="hidden" name="data_durasi_jam" id="data_durasi_jam">
                                <input type="hidden" name="data_ruangan" id="data_ruangan"> 
                                <input type="hidden" name="data_tambahan" id="data_tambahan">
                                <input type="hidden" name="data_total" id="data_total">  

                                <input type="hidden" name="data_tgl_mulai" id="data_tgl_mulai">  
                                <input type="hidden" name="data_tgl_sampai" id="data_tgl_sampai">  
                                <input type="hidden" name="data_jam_mulai" id="data_jam_mulai">  
                                <input type="hidden" name="data_jam_sampai" id="data_jam_sampai">  
                                <a href="{{route('pesan3.login')}}" class="hover:text-red-500">   
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
        var ruangans = @json($ruangan);
        var itemTambahan = @json($itemTambahan);
        var totalHarga = @json($totalHarga);

        // envet triger
        const inputHandler = function(e, src, dest) {
            let vals = e.target.value
           
            if(dest.tagName === 'LABEL'){
                dest.innerText = e.target.value;
                // mulai
                let jammulai = document.getElementById('jam-mulai')
                let tglmulai = document.getElementById('input-mulai')
                if(jammulai.value && tglmulai.value){
                    document.getElementById('data_tgl_mulai').setAttribute('value' ,document.getElementById('input-mulai').value)
                    document.getElementById('data_jam_mulai').setAttribute('value' ,document.getElementById('jam-mulai').value)

                    document.getElementById('lbl_tanggal_awal').innerHTML = document.getElementById('data_jam_mulai').value + " : " + document.getElementById('data_tgl_mulai').value 
                } 
                // sampai
                let jamSampai = document.getElementById('jam-sampai')
                let tglSampai = document.getElementById('input-sampai')
                if(jamSampai.value && tglSampai.value){
                    document.getElementById('data_tgl_sampai').setAttribute('value' ,document.getElementById('input-sampai').value)
                    document.getElementById('data_jam_sampai').setAttribute('value' ,document.getElementById('jam-sampai').value)

                    document.getElementById('lbl_tanggal_akhir').innerHTML = document.getElementById('data_jam_sampai').value + " : " + document.getElementById('data_tgl_sampai').value 
                }
                
                console.log("label")
            }else{
                dest.value = e.target.value;
                console.log("val")
            }
            
        }

        btn.addEventListener('click', function(event) {
                event.preventDefault();

                document.getElementById('data_ruangan').value = JSON.stringify(ruangans);
                document.getElementById('data_tambahan').value = JSON.stringify(itemTambahan);
                document.getElementById('data_total').value = totalHarga;
                document.getElementById('orderForm').submit();
        });
        // ================== PERUBAHAN DIMULAI ==================
        // btn.addEventListener('click', function(event) {
        //     event.preventDefault();

        //     // Ambil input tanggal dan jam
        //     const tglMulai = document.getElementById('input-mulai').value;
        //     const jamMulai = document.getElementById('jam-mulai').value;
        //     const tglSampai = document.getElementById('input-sampai').value;
        //     const jamSampai = document.getElementById('jam-sampai').value;

        //     if (!tglMulai || !jamMulai || !tglSampai || !jamSampai) {
        //         alert('Lengkapi tanggal dan jam terlebih dahulu.');
        //         return;
        //     }

        //     // Gabungkan jadi objek Date
        //     const mulai = new Date(`${tglMulai}T${jamMulai}`);
        //     const sampai = new Date(`${tglSampai}T${jamSampai}`);

        //     // Hitung durasi dalam jam (bulatkan ke atas)
        //     const selisihMs = sampai - mulai;
        //     let durasiJam = Math.ceil(selisihMs / (1000 * 60 * 60));
        //     if (durasiJam <= 0) durasiJam = 1;

        //     // Hitung ulang harga total
        //     let total = 0;
        //     ruangans.forEach(r => {
        //         r.subtotal = r.harga * durasiJam;
        //         total += r.subtotal;
        //     });

        //     // Tambah harga item tambahan
        //     itemTambahan.forEach(t => {
        //         total += parseInt(t.subtotal);
        //     });

        //     // Set ke form hidden input
        //     document.getElementById('data_ruangan').value = JSON.stringify(ruangans);
        //     document.getElementById('data_tambahan').value = JSON.stringify(itemTambahan);
        //     document.getElementById('data_total').value = total;
        //     document.getElementById('data_durasi_jam').value = durasiJam;

        //     document.getElementById('data_tgl_mulai').value = tglMulai;
        //     document.getElementById('data_jam_mulai').value = jamMulai;
        //     document.getElementById('data_tgl_sampai').value = tglSampai;
        //     document.getElementById('data_jam_sampai').value = jamSampai;

        //     document.getElementById('orderForm').submit();
        // });
        // ================== PERUBAHAN BERAKHIR ==================
        // ================== PERUBAHAN DIMULAI ==================
        function updateHargaTotal() {
            const tglMulai = document.getElementById('input-mulai').value;
            const jamMulai = document.getElementById('jam-mulai').value;
            const tglSampai = document.getElementById('input-sampai').value;
            const jamSampai = document.getElementById('jam-sampai').value;

            if (!tglMulai || !jamMulai || !tglSampai || !jamSampai) return;

            const mulai = new Date(`${tglMulai}T${jamMulai}`);
            const sampai = new Date(`${tglSampai}T${jamSampai}`);
            let durasiJam = Math.ceil((sampai - mulai) / (1000 * 60 * 60));
            if (durasiJam <= 0) durasiJam = 1;

            // Hitung ulang total dan update tampilan
            let total = 0;

            // Update harga ruangan
            document.querySelectorAll('.harga-ruangan').forEach((el, index) => {
                const hargaPerJam = parseInt(el.getAttribute('data-harga'));
                const subtotal = hargaPerJam * durasiJam;
                el.querySelector('.harga-ruangan-value').innerText = subtotal.toLocaleString('id-ID');
                total += subtotal;

                // update juga ke ruangans JS object
                if (ruangans[index]) ruangans[index].subtotal = subtotal;
            });

            // Tambahkan item tambahan ke total
            if(itemTambahan){
                itemTambahan.forEach(t => {
                    total += parseInt(t.subtotal);
                });
            }

            document.getElementById('label-total-harga').innerText = total.toLocaleString('id-ID');
            totalHarga = total; 
            document.getElementById('data_total').setAttribute('value', totalHarga);
        }
        // ================== PERUBAHAN BERAKHIR ==================


        document.getElementById('mulai-ok').addEventListener('click',function(){
            const inputMulai = document.getElementById('input-mulai')
            if(inputMulai){
                document.getElementById('data_tgl_mulai').setAttribute('value' ,document.getElementById('input-mulai').value)
                document.getElementById('data_jam_mulai').setAttribute('value' ,document.getElementById('jam-mulai').value)

                document.getElementById('lbl_tanggal_awal').innerHTML = document.getElementById('data_jam_mulai').value + " : " + document.getElementById('data_tgl_mulai').value 
            }
        })

        document.getElementById('sampai-ok').addEventListener('click', function(){
            const inputSampai = document.getElementById('input-sampai')
            if(inputSampai){
                document.getElementById('data_tgl_sampai').setAttribute('value' ,document.getElementById('input-sampai').value)
                document.getElementById('data_jam_sampai').setAttribute('value' ,document.getElementById('jam-sampai').value)

                document.getElementById('lbl_tanggal_akhir').innerHTML = document.getElementById('data_jam_sampai').value + " : " + document.getElementById('data_tgl_sampai').value 
            }
        })

        // autoo fire
         const inputMulai = document.getElementById('input-mulai')
         const jamMulai =  document.getElementById('jam-mulai')
        if(inputMulai && jamMulai){
            inputMulai.addEventListener('input', function(e) {
                inputHandler(e, inputMulai, document.getElementById('lbl_tanggal_awal'));
                updateHargaTotal();
            });
            
            jamMulai.addEventListener('input', function(e) {
                inputHandler(e, jamMulai, document.getElementById('lbl_tanggal_awal'));
                updateHargaTotal();
            });

        }

         const inputsampai = document.getElementById('input-sampai')
         const jamsampai =  document.getElementById('jam-sampai')
        if(inputsampai && jamsampai){
            console.log("sampai")
            inputsampai.addEventListener('input', function(e) {
                inputHandler(e, inputsampai, document.getElementById('lbl_tanggal_akhir'));
                updateHargaTotal();
            });
            
            jamsampai.addEventListener('input', function(e) {
                inputHandler(e, jamsampai, document.getElementById('lbl_tanggal_akhir'));
                updateHargaTotal();
            });

        }
    });

</script>
@endsection