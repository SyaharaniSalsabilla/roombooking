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
                            Tinjau ulang dan konfirmasi
                        </h2>
                        <div class="flex flex-col justify-center items-center bg-primary-1 rounded-lg p-8">
                            <h2 class="w-full text-center font-primary font-semibold text-xl text-primary-5 mb-4">
                                Kebijakan pembatalan
                            </h2>
                            <ul class="list-decimal">
                                <li>Pembatalan Lebih dari 24 Jam Sebelum Waktu Pemakaian:
                                    Pembatalan yang dilakukan lebih dari 24 jam sebelum waktu pemakaian yang telah
                                    dijadwalkan akan mendapatkan pengembalian dana 100% dari total pembayaran yang sudah
                                    dilakukan.</li>
                                <li>Pembatalan Antara 12 hingga 24 Jam Sebelum Waktu Pemakaian:
                                    Pembatalan yang dilakukan antara 12 hingga 24 jam sebelum waktu pemakaian hanya
                                    berhak atas pengembalian dana sebesar 50% dari total pembayaran.</li>
                                <li>Pembatalan Kurang dari 12 Jam Sebelum Waktu Pemakaian:
                                    Pembatalan yang dilakukan kurang dari 12 jam sebelum waktu pemakaian tidak berhak
                                    atas pengembalian dana.</li>
                                <li>Pembatalan Mendadak atau Tidak Hadir (No-Show):
                                    Jika Anda tidak hadir atau melakukan pembatalan setelah waktu pemakaian yang telah
                                    dijadwalkan, tidak ada pengembalian dana yang akan diberikan</li>
                                <li>Cara Melakukan Pembatalan:
                                    Semua permintaan pembatalan harus dilakukan melalui kontak yang tertera pada laman
                                    Kontak dengan mencantumkan nomor reservasi dan rincian lainnya.</li>
                                <li>Pengecualian:
                                    Jika pembatalan disebabkan oleh keadaan darurat yang tidak dapat dihindari, silakan
                                    hubungi kami segera untuk membahas kemungkinan kebijakan pengembalian dana khusus.
                                </li>
                            </ul>
                        </div>
                        <div class="flex flex-col items-center bg-primary-1 rounded-lg p-8">
                            <h2 class="w-full text-center font-primary font-semibold text-xl text-primary-5 mb-4">
                                Tambah Catatan Pesanan
                            </h2>
                            <p for="" class="text-left">Sertakan Komentar atau permintaan terkait pesanan</p>
                            <textarea name="" rows="5" id="" class="border border-primary-5 w-full rounded-lg bg-primary-1 p-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"></textarea>
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
                            <div class="grid grid-cols-2 items-center py-2">
                                <h2 class="text-primary-5 text-2xl font-semibold text-center">Plantaran</h2>
                                <p class="text-center">IDR XXXXXX</p>
                            </div>
                            <div class="grid grid-cols-2 items-center py-2">
                                <h2 class="text-primary-5 text-2xl font-semibold text-center">Cemilan</h2>
                                <p class="text-center">IDR XXXXXX</p>
                            </div>
                            <div class="grid grid-cols-2 items-center py-2">
                                <h2 class="text-primary-5 text-2xl font-semibold text-center">Total</h2>
                                <p class="text-center">IDR XXXXXX</p>
                            </div>
                            <div class="grid grid-cols-1 items-center p-4">

                                <button class="text-primary-2 bg-primary-5 rounded-xl py-2 px-4">Lanjutkan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
@endsection