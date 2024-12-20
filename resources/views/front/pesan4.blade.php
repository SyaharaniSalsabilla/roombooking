@extends('template.front.main')
@section('content')
<section id="hiro" class=" mb-6">
            <div class="container flex flex-col justify-center py-8">
                <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Pesan
                    Ruangan
                </h2>
                <div class="grid grid-cols-3 gap-12">
                    <div class="flex flex-col gap-2 col-span-2 font-secondary text-justify">
                        <p>Langkah 4 dari 4</p>
                        <h2 class="w-full font-primary font-semibold text-3xl text-primary-5 mb-2">
                            Pilih Metode Pembayaran
                        </h2>
                        <div class="flex flex-col justify-center items-center bg-primary-1 rounded-lg p-8">
                            <h2 class="w-full text-center font-primary font-semibold text-xl text-primary-5 mb-4">
                                Tranfer Bank
                            </h2>
                            <div class="grid grid-cols-4 gap-2">
                                <div class="flex justify-center items-center bg-primary-4 rounded-lg hover:scale-95">
                                    <img src="../../../assets/front/image/ATM.png" alt="">
                                </div>
                                <div class="flex justify-center items-center bg-primary-4 rounded-lg hover:scale-95">
                                    <img src="../../../assets/front/image/BCA.png" alt="">
                                </div>
                                <div class="flex justify-center items-center bg-primary-4 rounded-lg hover:scale-95">
                                    <img src="../../../assets/front/image/BCA.png" alt="">
                                </div>
                                <div class="flex justify-center items-center bg-primary-4 rounded-lg hover:scale-95">
                                    <img src="../../../assets/front/image/BCA.png" alt="">
                                </div>
                                <div class="flex justify-center items-center bg-primary-4 rounded-lg hover:scale-95">
                                    <img src="../../../assets/front/image/BCA.png" alt="">
                                </div>
                                <div class="flex justify-center items-center bg-primary-4 rounded-lg hover:scale-95">
                                    <img src="../../../assets/front/image/ATM" alt="">
                                </div>
                                <div class="flex justify-center items-center bg-primary-4 rounded-lg hover:scale-95">
                                    <img src="../../../assets/front/image/BCA.png" alt="">
                                </div>
                                <div class="flex justify-center items-center bg-primary-4 rounded-lg hover:scale-95">
                                    <img src="../../../assets/front/image/BCA.png" alt="">
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