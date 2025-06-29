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
                                <input type="checkbox" name="terms[]" value="{{$Ruangan->harga}}" data-ir="{{$Ruangan->id}}" data-nr="{{$Ruangan->nama_ruangan}}" data-diskon="{{$Ruangan->diskon}}"
                                    class="checkbox-item before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border
                                    border-primary-5 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12
                                    before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-red-500 before:opacity-0
                                    before:transition-opacity hover:before:opacity-10 checked:border-red-500 checked:before:bg-red-500" {{ $pesanan->id == $Ruangan->id ? "checked" : '' }}/>
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
                                data-harga="{{ number_format($Ruangan->harga, 0, ',', '.') }}"
                                data-deskripsi="{{$Ruangan->deskripsi}}"
                                data-image="{{$Ruangan->image}}"
                                data-nama="{{$Ruangan->nama_ruangan}}" data-fasilitas="{{$fasilitas_umum}}">
                                Lebih Lengkap
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
                            @foreach($fasilitas as $fas)
                            <tr class="">
                                <td class="py-3 px-4 border border-slate-400">{{$loop->iteration}}</td>
                                <td class="py-3 px-4 border border-slate-400"><span id="id_tambahan" value="{{$fas->id}}"></span><label id="nm_tambahan" value="{{$fas->nama_fasilitas}}">{{$fas->nama_fasilitas}}</label></td>
                                <td class="py-3 px-4 border border-slate-400">
                                    <div class="flex flex-col gap-1">
                                        <span>{{$fas->deskripsi}}</span>
                                        <!-- <button class="bg-primary-5 openModal2 text-white px-3 py-1 rounded text-sm w-fit" id="fasilitas_detail"
                                        data-image="{{ url('/assets/front/image/') .'/'. $fas->image}}">Lihat Detail</button> -->
                                    </div>
                                </td>
                                <td class="py-3 px-4 border border-slate-400"><label id="hrg_tambahan" value='{{ $fas->harga_satuan }}' data-id="{{$fas->id}}">
                                    {{ number_format($fas->harga_satuan, 0, ',', '.') }}
                                </td>
                                <td class="py-3 px-4 border border-slate-400">
                                    <div class="flex items-center gap-3">
                                        <button class="text-primary-5 font-bold text-xl minus">−</button>
                                        <span class="quantity"><label class="qty_tambahan">0</label></span>
                                        <button class="text-primary-5 font-bold text-xl plus">+</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-span-1">
                <div class="flex flex-col mb-4">
                    <button class="text-primary-2 bg-primary-5 rounded-xl py-2 px-4" onclick="history.back()">Kembali</button>
                </div>
                <div class="flex flex-col divide-y-2 divide-primary-5 bg-primary-1 rounded-lg">
                    <div class="flex justify-center items-center p-2">
                        <img src="../../../assets/front/image/Anindhaloka Logo.png" width="60px" alt="">
                        <h2 class="font-primary font-semibold uppercase text-xl text-primary-5">Nin Space
                        </h2>
                    </div>
                    <div class="items-center py-2 space-y-2 div-nr">
                        <div class="item-1 grid grid-cols-2 ">
                            <p class="text-primary-5 text-left text-2xl font-semibold px-4 py-1">Nama Ruangan</p>
                            <p class="text-right px-4">IDR <label id="ruangan-harga">XXXXXX</label></p>
                        </div>
                    </div>
                    <div class="items-center py-2 space-y-2 px-4 div-na">
                        <div class="item-summary flex justify-between border-b py-2">
                            <p class="item-id text-primary-5 font-semibold default invisible" id="id-tambahan"></p>
                            <p class="item-name text-primary-5 text-left font-semibold default" id="nama-tambahan">Nama Item</p>
                            <p class="item-quantity text-sm font-semibold default"><label id="jumlah-tambahan">Jumlah</label></p>
                            <p class="item-subtotal text-sm default">IDR <label id="harga-tambahan">XXXXXX</label></p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 items-center py-2 div-tot">
                        <h2 class="text-primary-5 text-2xl font-semibold text-center">Total</h2>
                        <p class="text-center">IDR XXXXXX</p>
                    </div>
                    <form method="POST" id="orderForm" action="{{route('pesan2')}}">
                        @csrf
                        <input type="hidden" name="data_json" id="data_json">
                        <a href="#" class="hover:text-red-500">
                            <div class="grid grid-cols-1 items-center p-4">
                                <button id="btn_submit" class="text-primary-2 bg-primary-5 rounded-xl py-2 px-8">Lanjutkan</button>
                            </div>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <div id="modal2" class="fixed z-50 inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-primary-1 rounded-lg w-1/4 shadow-lg max-h-screen">
            <div class="w-full relative rounded-lg">
                <img src="{{ url('../../../assets/front/image/'.'Sarapan.png') }}" class="rounded-xl z-0 relative" height="120%" alt="" id="img_fas">
                <button id="closeModal2"
                    class="absolute top-2 text-white right-2 bg-primary-5 px-2 py-1 hover:bg-red-500 focus:outline-none">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>
    </div> -->
</section>
@include('components.modal')
@endsection
@section('script')
<script>
document.addEventListener('DOMContentLoaded', function(){
    const btnDetails = document.querySelectorAll(".btn-detail");
    const lblKapasitas = document.getElementById('lbl-kapasitas');
    const modal2 = document.getElementById('modal2');
    const openModal2 = document.querySelectorAll('.openModal2');
    const closeModal2 = document.getElementById('closeModal2');
    const minusButtons = document.querySelectorAll('.minus');
    const plusButtons = document.querySelectorAll('.plus');
    const terms = document.querySelectorAll('.checkbox-item');
    const lblRuanganHarga = document.getElementById('ruangan-harga');
    const divNR = document.getElementsByClassName('div-nr')[0];
    const divNA = document.getElementsByClassName('div-na')[0];
    const harga_tambahan = document.getElementById('harga-tambahan');
    //
    const id_tambahan = document.getElementById('id_tambahan');
    const qty_tambahan = document.getElementById('qty_tambahan');
    const nm_tambahan = document.getElementById('nm_tambahan');
    const hrg_tambahan = document.getElementById('hrg_tambahan');


    var total_tambahan =0;
    var lastCount = 0;

    if (btnDetails) {
        btnDetails.forEach(btn => {
            btn.addEventListener('click', function(evt) {
                lblKapasitas.innerHTML = evt.target.getAttribute('data-kapasitas') + " Orang";
                document.getElementById('lbl-panjang').innerHTML = evt.target.getAttribute('data-panjang');
                document.getElementById('lbl-lebar').innerHTML = evt.target.getAttribute('data-lebar');
                document.getElementById('lbl-harga').innerHTML = evt.target.getAttribute('data-harga');
                document.getElementById("lbl-nama").innerHTML = evt.target.getAttribute("data-nama");
                document.getElementById("lbl-id").innerHTML = evt.target.getAttribute("data-id");
                var path =  "{{ url('/assets/front/image/')}}/";
                document.getElementById('gambarModal').setAttribute('src', path + evt.target.getAttribute('data-image'));
                document.querySelector(".deskripsi").innerHTML = evt.target.getAttribute("data-deskripsi");
                // modal.classList.remove('hidden'); // Show modal
                fetchFasilitas(evt.target.getAttribute("data-id"));
            });
        });
    }

    let ids= [];
    let names = [];
    let selected = [];
    let diskons = [];

    let pesanan_id = {{$pesanan ? $pesanan->id : 0}}

    if (terms && divNR) {
        if(pesanan_id > 0){
            selected = Array.from(document.querySelectorAll('.checkbox-item:checked')).map(checkbox => parseFloat(checkbox.value));
                names = Array.from(document.querySelectorAll('.checkbox-item:checked')).map(checkbox => checkbox.getAttribute('data-nr'));
                ids = Array.from(document.querySelectorAll('.checkbox-item:checked')).map(checkbox => checkbox.getAttribute('data-ir'));
                diskons = Array.from(document.querySelectorAll('.checkbox-item:checked')).map(checkbox => checkbox.getAttribute('data-diskon'));

                    selected = selected.map((value, index) => {
                        const diskon = parseFloat(diskons[index]) || 0;
                        return value - (value * diskon / 100);
                    });

                const totalSum = selected.reduce((sum, value) => sum + value, 0);
                lblRuanganHarga.innerHTML = totalSum.toLocaleString();
                divNR.innerHTML = '';

                names.forEach((name, index) => {
                    const wrapperDiv = createComponent('div', ['items-center', 'div-nr'], '', divNR);
                    const item1Div = createComponent('div', ['item-1', 'grid', 'grid-cols-2'], '', wrapperDiv);
                    createComponent('p', ['text-primary-5', 'text-2xl', 'font-semibold', 'text-left', 'px-4', 'py-1'], name, item1Div);
                    createComponent('p', ['text-right','px-4'], `IDR <label id="ruangan-harga">${selected[index].toLocaleString()}</label>`, item1Div);
                });
                updateTotal()
        }
        terms.forEach(item => {
            item.addEventListener('click', (e) => {
                selected = Array.from(document.querySelectorAll('.checkbox-item:checked')).map(checkbox => parseFloat(checkbox.value));
                names = Array.from(document.querySelectorAll('.checkbox-item:checked')).map(checkbox => checkbox.getAttribute('data-nr'));
                ids = Array.from(document.querySelectorAll('.checkbox-item:checked')).map(checkbox => checkbox.getAttribute('data-ir'));
                diskons = Array.from(document.querySelectorAll('.checkbox-item:checked')).map(checkbox => checkbox.getAttribute('data-diskon'));

                selected = selected.map((value, index) => {
                    const diskon = parseFloat(diskons[index]) || 0;
                    return value - (value * diskon / 100);
                });
                const totalSum = selected.reduce((sum, value) => sum + value, 0);
                lblRuanganHarga.innerHTML = totalSum.toLocaleString();
                divNR.innerHTML = '';

                names.forEach((name, index) => {
                    const wrapperDiv = createComponent('div', ['items-center', 'div-nr'], '', divNR);
                    const item1Div = createComponent('div', ['item-1', 'grid', 'grid-cols-2'], '', wrapperDiv);
                    createComponent('p', ['text-primary-5', 'text-2xl', 'font-semibold', 'text-left', 'px-4', 'py-1'], name, item1Div);
                    createComponent('p', ['text-right', 'px-4'], `IDR <label id="ruangan-harga">${selected[index].toLocaleString()}</label>`, item1Div);
                });
                updateTotal()
            });
        });
    }

    if (openModal2 && modal2) {
        openModal2.forEach(button => {
            button.addEventListener('click', (evt) => {
                var img = evt.target.getAttribute('data-image');
                document.getElementById('img_fas').setAttribute('src', img);

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
        });
    }
    if(minusButtons && plusButtons){
        minusButtons.forEach(button => {
            button.addEventListener('click', function (evt) {
                const quantityElement = this.nextElementSibling;
                let quantity = parseInt(quantityElement.textContent);
                const row = this.closest('tr');
                const id = row.querySelector('#id_tambahan').getAttribute('value');

                const nama = row.querySelector('#nm_tambahan').getAttribute('value');
                let hrgSatuan = parseInt( row.querySelector('#hrg_tambahan').getAttribute('value'));
                let idFasilitas = parseInt( row.querySelector('#hrg_tambahan').getAttribute('value'));

                if(quantity < 1){

                }

                if (quantity > 0) {

                    quantity--; // Kurangi jumlah
                    quantityElement.textContent = quantity; // Update jumlah
                    quantityElement.setAttribute('value', quantity); // Update value
                    let harga = hrgSatuan * quantity;

                    hargaCalculate(divNA, nama, quantity, hrgSatuan,id);

                    harga_tambahan.textContent = 'IDR ' + harga;

                    updateTotal();
                }
            });
        });

        plusButtons.forEach(button => {
            button.addEventListener('click', function (evt) {
                const quantityElement = this.previousElementSibling;
                let quantity = parseInt(quantityElement.textContent);
                quantity++;
                quantityElement.textContent = quantity;

                const row = this.closest('tr');
                const id = row.querySelector('#id_tambahan').getAttribute('value');
                const nama = row.querySelector('#nm_tambahan').getAttribute('value');
                let hrgSatuan = row.querySelector('#hrg_tambahan').getAttribute('value');
                // Cek apakah divNA sudah terisi atau belum

                const defaultcontent = divNA.querySelectorAll('.default')[0];
                if (defaultcontent) {
                    divNA.innerHTML = ''
                    hargaCalculate(divNA, nama, quantity, hrgSatuan,id);
                } else {
                    hargaCalculate(divNA, nama, quantity, hrgSatuan,id);
                }
                updateTotal();
            });
        });
    }

    function createComponent(elementType, classes = [], content = '', container) {
        const newElement = document.createElement(elementType);
        newElement.innerHTML = content;
        newElement.classList.add(...classes);
        container.appendChild(newElement);
        return newElement;
    }

    function hargaCalculate(container, nama, quantity, satuan, id) {
        // Cari item berdasarkan nama
        let existingItem = Array.from(container.children).find(child =>
            child.querySelector('.item-name')?.textContent === nama
        );

        let subTotal = parseInt(satuan * quantity);

        if (existingItem) {
            // Update quantity dan subtotal jika item sudah ada
            existingItem.querySelector('.item-quantity').textContent = `${quantity}`;
            existingItem.querySelector('.item-subtotal').textContent = `IDR ${subTotal.toLocaleString()}`;
        } else {
            // Buat elemen baru untuk item
            const wrapperDiv = createComponent('div', ['item-summary', 'flex', 'justify-between', 'border-b', 'py-2'], '', container);

            // Tambahkan atribut data-id ke wrapper
            wrapperDiv.dataset.id = id; // Pastikan id diset di sini
            console.log(id)
            // Tambahkan elemen lainnya
            createComponent('p', ['item-name', 'text-primary-5', 'font-semibold'], nama, wrapperDiv);
            createComponent('p', ['item-quantity', 'text-sm'], `${quantity}`, wrapperDiv);
            createComponent('p', ['item-subtotal', 'text-sm', 'font-semibold'], `IDR ${subTotal.toLocaleString()}`, wrapperDiv);
        }
    }

    // fetch data
    function fetchFasilitas(ruanganId) {
        fetch(`/ruangan/${ruanganId}/fasilitas`)
            .then(response => response.json())
            .then(data => {
                if (data) {

                    // Tampilkan fasilitas di modal
                    const container = document.getElementById('fasilitas-container');
                    container.innerHTML = ''; // bersihkan konten lama

                    if (Array.isArray(data.cn_fasilitas)) {
                        data.cn_fasilitas.forEach(fas => {
                            container.innerHTML += `
                                <div class="flex flex-col items-center gap-2">
                                    <i class="fa-solid ${fas.image || 'fa-circle-question'} text-2xl"></i>
                                    <h2 class="text-xs">${fas.nama_fasilitas}</h2>
                                </div>`;
                        });
                    } else {
                        console.warn('cn_fasilitas tidak tersedia atau bukan array:', data.cn_fasilitas);
                    }

                }
            });
    }



    // Fungsi untuk mengupdate total harga (ruangan + item tambahan)
    function updateTotal() {
        const totalRuangan = selected.reduce((sum, value) => sum + value, 0);

        let additionalTotal = 0;
        const additionalItems = Array.from(document.querySelectorAll('.item-summary'));
        additionalItems.forEach(item => {
            const priceElement = item.querySelector('.item-subtotal');
            if (priceElement) {
                const itemPrice = parseFloat(priceElement.textContent.replace('IDR ', '').replace(/,/g, ''));
                additionalTotal += itemPrice;
            }
        });

        let grandTotal = totalRuangan;

        if (additionalTotal > 0) {
            grandTotal += additionalTotal;
        }

        const totalDiv = document.querySelector('.div-tot p');
        if (totalDiv) {
            totalDiv.innerHTML = `IDR ${grandTotal.toLocaleString()}`;
        }
    }

    function prepareDataForController() {
        // Buat array untuk data ruangan
        const ruanganData = selected.map((value, index) => ({
            id: ids[index],
            nama: names[index],
            harga: value,
            diskon: parseFloat(diskons[index]) || 0 // Pastikan diskon
        }));

        // Hitung total harga semua ruangan
        const totalRuangan = selected.reduce((sum, value) => sum + value, 0);

        // Buat array untuk item tambahan
        const itemTambahan = [];
        const additionalItems = Array.from(document.querySelectorAll('.item-summary'));
        additionalItems.forEach(item => {
            // Ambil data dari atribut 'data-id' untuk id item
            const id = item.dataset.id; // Mengambil data-id yang sebelumnya disimpan di atribut
            const name = item.querySelector('.item-name').textContent;
            const quantityElement = item.querySelector('.item-quantity');
            const quantity = parseInt(quantityElement.textContent);
            const priceElement = item.querySelector('.item-subtotal');
            const itemPrice = parseFloat(priceElement.textContent.replace('IDR ', '').replace(/,/g, ''));

            if (itemPrice > 0) {
                itemTambahan.push({
                    id: id, // Menggunakan id dari data-id
                    nama: name,
                    jumlah: quantity,
                    subtotal: itemPrice
                });
            }
        });

        // Hitung total harga tambahan
        const totalTambahan = itemTambahan.reduce((sum, item) => sum + item.subtotal, 0);

        // Hitung total keseluruhan
        const totalHarga = totalRuangan + totalTambahan;

        // Struktur data untuk dikirim
        const dataToSend = {
            ruangan: ruanganData.length > 0 ? ruanganData : null, // Jika tidak ada ruangan, set null
            itemTambahan: itemTambahan.length > 0 ? itemTambahan : null, // Jika tidak ada tambahan, set null
            totalHarga: totalHarga
        };

        return dataToSend;
    }



    document.querySelector('#btn_submit').addEventListener('click', function(event) {
        event.preventDefault();

        const dataToSend = prepareDataForController();

        document.getElementById('data_json').value = JSON.stringify(dataToSend);
        document.getElementById('orderForm').submit();
    });


});
</script>
<script>
    document.addEventListener('DOMContentLoaded', ()=>{
        const fasilitas_detail= document.getElementById('fasilitas_detail').addEventListener('click', function(event) {
        })
    })

</script>
@endsection
