<div id="modal" class="fixed z-50 inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-primary-1 rounded-lg w-2/5 shadow-lg max-h-screen overflow-y-auto">
        <!-- Bagian Atas dengan Overflow Hidden -->
        <div class="w-full relative rounded-t-lg overflow-hidden">
            <img src="" class="w-full h-64 object-cover rounded-lg" alt="Gambar Modal" id="gambarModal">
            <button id="closeModal"
                class="absolute top-2 text-white right-2 bg-primary-5 px-2 py-1 hover:bg-red-500 focus:outline-none">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="flex w-full bottom-3 px-4 justify-between absolute">
                <span class="text-white bg-primary-5 px-2 py-1 flex text-sm items-center gap-2 rounded-md">
                    <i class="fa-solid fa-users"></i>
                    Kapasitas : <label id="lbl-kapasitas"/> Orang
                </span>
                <span class="text-white bg-primary-5 px-2 py-1 flex text-sm items-center gap-2 rounded-md">
                    <i class="fa-solid fa-expand"></i>
                    Ukuran ruangan : <label id="lbl-panjang"></label> X <label id="lbl-lebar"></label> meter
                </span>
            </div>
        </div>
        <!-- Konten Modal -->
        <div class="p-4 flex justify-between">
            <div class="flex flex-col">
                <h2 class=" font-primary text-lg uppercase" ><label id="lbl-nama"></label></h2>
                <h2 class=" font-primary text-base uppercase">IDR <label id="lbl-harga">XXXXX</label></h2>
            </div>
            @php
            $pointer = basename(url()->current())
            @endphp
            @if($pointer !== 'pesan1')
            <a href="{{route('pesan1')}}" class="hover:text-red-500">
                <button class="bg-primary-5 text-white px-4 py-1 rounded-lg">Pesan Sekarang</button>
            </a>
            @endif
            
        </div>
        <hr class="h-1 my-1 mx-4 bg-primary-5 border-0 dark:bg-gray-700">
        <div class="p-4">
            <p class="text-center deskripsi">Plataran artinya serambi atau halaman rumah. Plataran merupakan ruang
                terbuka (outdoor) yang hijau dan sejuk, berlokasi di halaman Rumah
                Anindhaloka. Plataran sangat sesuai untuk kegiatan kumpul keluarga,
                komunitas, maupun bisnis, seperti ulang tahun, peluncuran produk, pertunjukan
                musik, dan office gathering.</p>
        </div>
        <hr class="h-1 my-1 mx-4 bg-primary-5 border-0 dark:bg-gray-700">
    </div>
</div>