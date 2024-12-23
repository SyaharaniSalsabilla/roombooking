@extends('template.front.main')
@section('content')
<section id="hiro" class=" mb-6"><section id="hiro" class=" mb-6">
    <div class="container flex flex-col justify-center py-8">
        <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Pesan
            Ruangan
        </h2>
        <div class="grid grid-cols-3 gap-12">
            <div class="flex flex-col gap-2 col-span-2 font-secondary text-justify">
                <p>Langkah 1 dari 4</p>
                <h2 class="w-full font-primary font-semibold text-3xl text-primary-5 mb-2">
                    Pilih Ruangan
                </h2>
                <div class="flex flex-col mb-2 gap-2">
                    @foreach($datas as $Ruangan)
                    <div class="flex bg-primary-1 rounded-lg justify-between items-center">
                        <label class="flex items-center space-x-3 cursor-pointer group p-4 rounded-md">
                            <div class="relative flex items-center">
                                <input type="checkbox" name="terms[]" value="{{$Ruangan->harga}}" data-nr="{{$Ruangan->nama_ruangan}}"
                                    class="checkbox-item before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border 
                                    border-primary-5 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 
                                    before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-red-500 before:opacity-0 
                                    before:transition-opacity hover:before:opacity-10 checked:border-red-500 checked:before:bg-red-500" />
                                <div
                                    class="pointer-events-none absolute  top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-primary-5 opacity-0 transition-opacity peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                        viewBox="0 0 16 16" fill="currentColor">
                                        <circle cx="8" cy="8" r="4" />
                                    </svg>
                                </div>
                            </div>
                            <span class="text-lg text-primary-5">
                                {{$Ruangan->nama_ruangan}}
                            </span>
                        </label>
                        <button class="text-primary-2 openModal bg-primary-5 rounded-2xl py-1 px-3 mr-2 btn-detail"
                                data-id="{{$Ruangan->id}}"
                                data-kapasitas="{{$Ruangan->kapasitas}}"
                                data-panjang="{{$Ruangan->panjang_ruangan}}"
                                data-lebar="{{$Ruangan->lebar_ruangan}}"
                                data-harga="{{$Ruangan->harga}}"
                                data-deskripsi="{{$Ruangan->deskripsi}}"
                                data-image="{{$Ruangan->image}}"
                                data-nama="{{$Ruangan->nama_ruangan}}">Lihat
                            Lebih lengkap
                        </button>
                    </div>
                    @endforeach
                </div>


                <h2 class="w-full font-primary font-semibold text-3xl text-primary-5 mb-2">
                    Pilih Tambahan
                </h2>
                <div class=" bg-primary-1 rounded-lg">
                    <table
                        class="table-auto w-full overflow-hidden text-sm border-collapse border border-slate-400" >
                        <thead class="border border-red-600">
                            <tr class="text-primary-5 border">
                                <th class="py-3 px-4 text-left border border-slate-400">No</th>
                                <th class="py-3 px-4 text-left border border-slate-400">Nama</th>
                                <th class="py-3 px-4 text-left border border-slate-400">Keterangan</th>
                                <th class="py-3 px-4 text-left border border-slate-400">Harga</th>
                                <th class="py-3 px-4 text-left border border-slate-400">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td class="py-3 px-4 border border-slate-400">1</td>
                                <td class="py-3 px-4 border border-slate-400">Catering Sarapan</td>
                                <td class="py-3 px-4 border border-slate-400">
                                    <div class="flex flex-col gap-1">
                                        <span>1 paket = 5 porsi sarapan</span>
                                        <button
                                            class="bg-primary-5 openModal2 text-white px-3 py-1 rounded text-sm w-fit">Lihat
                                            Detail</button>
                                    </div>
                                </td>
                                <td class="py-3 px-4 border border-slate-400">Rp xxxxxxxx</td>
                                <td class="py-3 px-4 border border-slate-400">
                                    <div class="flex items-center gap-3">
                                        <button class="text-primary-5 font-bold text-xl">−</button>
                                        <span>1</span>
                                        <button class="text-primary-5 font-bold text-xl">+</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="py-3 px-4 border border-slate-400">2</td>
                                <td class="py-3 px-4 border border-slate-400">Catering Makan Siang</td>
                                <td class="py-3 px-4 border border-slate-400">
                                    <div class="flex flex-col gap-1">
                                        <span>1 paket = 5 porsi makan siang</span>
                                        <button
                                            class="bg-primary-5 openModal2 text-white px-3 py-1 rounded text-sm w-fit">Lihat
                                            Detail</button>
                                    </div>
                                </td>
                                <td class="py-3 px-4 border border-slate-400">Rp xxxxxxxx</td>
                                <td class="py-3 px-4 border border-slate-400">
                                    <div class="flex items-center gap-3">
                                        <button class="text-primary-5 font-bold text-xl">−</button>
                                        <span>1</span>
                                        <button class="text-primary-5 font-bold text-xl">+</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                    <div class="grid grid-cols-2 items-center py-2 space-y-2 div-nr">
                        <h2 class="text-primary-5 text-2xl font-semibold text-center">Plantaran</h2>
                        <p class="text-center">IDR <label id="ruangan-harga">xxxxxxxx</label></p>
                    </div>
                    <div class="grid grid-cols-2 items-center py-2 div-na">
                        <h2 class="text-primary-5 text-2xl font-semibold text-center">Cemilan</h2>
                        <p class="text-center">IDR XXXXXX</p>
                    </div>
                    <div class="grid grid-cols-2 items-center py-2 div-tot">
                        <h2 class="text-primary-5 text-2xl font-semibold text-center">Total</h2>
                        <p class="text-center">IDR XXXXXX</p>
                    </div>
                    <div class="grid grid-cols-1 items-center p-4">
                    <a href="{{route('pesan2')}}" class="hover:text-red-500">
                        <button class="text-primary-2 bg-primary-5 rounded-xl py-2 px-8">Lanjutkan</button>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('components.modal')
@endsection
@section('script')
<script>
        const modal2 = document.getElementById('modal2');
        const openModal2 = document.querySelectorAll('.openModal2');
        const closeModal2 = document.getElementById('closeModal2');
        const terms = document.querySelectorAll('.checkbox-item');
        const lblRuanganHarga = document.getElementById('ruangan-harga');
        const divNR = document.getElementsByClassName('div-nr')[0];  // Get the first div with the class 'div-nr'

        let names = [];
        let selected = [];

        terms.forEach(item => {
            item.addEventListener('click', (e) => {
                selected = Array.from(document.querySelectorAll('.checkbox-item:checked')).map(checkbox => parseFloat(checkbox.value));
                names = Array.from(document.querySelectorAll('.checkbox-item:checked')).map(checkbox => checkbox.getAttribute('data-nr'));
                
                const totalSum = selected.reduce((sum, value) => sum + value, 0);
                lblRuanganHarga.innerHTML = totalSum.toFixed(2); 
                divNR.innerHTML = '';
                // 1. left
                names.forEach(name => {
                    createComponent('h2', ['text-primary-5', 'text-2xl', 'font-semibold', 'text-center'], name, divNR);
                });
                // 2. right
                selected.forEach(sel => {
                        createComponent('p', ['text-center'], `IDR <label id="ruangan-harga">${sel}</label>`, divNR);
                });
                // 3. tambahkan br disini

            });
        });

        function createComponent(elementType, classes = [], content = '', container) {
            const newElement = document.createElement(elementType);
            newElement.innerHTML = content;
            newElement.classList.add(...classes);
            container.appendChild(newElement);
        }




       /**  openModal2.forEach(button => {
            button.addEventListener('click', () => {
                modal2.classList.remove('hidden');
            });
        });

        // Tutup modal (dari tombol close)
        closeModal2.addEventListener('click', () => {
            modal2.classList.add('hidden');
        });

        // Tutup modal jika klik di luar modal
        modal2.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal2.classList.add('hidden');
            }
        });*/

    document.addEventListener('DOMContentLoaded', function(){
        const btnDetails = document.querySelectorAll(".btn-detail");
        const lblKapasitas = document.getElementById('lbl-kapasitas');
        btnDetails.forEach(btn => {
            btn.addEventListener('click', function(evt) {
                lblKapasitas.innerHTML = evt.target.getAttribute('data-kapasitas') + " Orang";
                document.getElementById('lbl-panjang').innerHTML = evt.target.getAttribute('data-panjang');
                document.getElementById('lbl-lebar').innerHTML = evt.target.getAttribute('data-lebar');
                document.getElementById('lbl-harga').innerHTML = evt.target.getAttribute('data-harga');
                document.getElementById("lbl-nama").innerHTML = evt.target.getAttribute("data-nama");
                var path =  "{{ url('/assets/front/image/')}}/";
                document.getElementById('gambarModal').setAttribute('src', path + evt.target.getAttribute('data-image'));
                document.querySelector(".deskripsi").innerHTML = evt.target.getAttribute("data-deskripsi");
                // modal.classList.remove('hidden'); // Show modal
            });
        });
    });
</script>

@endsection