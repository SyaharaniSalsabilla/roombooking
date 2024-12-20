@extends('template.front.main')
@section('content')
<div id="app" class="bg-primary-2">
        <section id="hiro" class=" mb-6">
            <div class="container flex flex-col justify-center py-8">
                <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Tentang
                    Kami
                </h2>
                <div class="grid grid-cols-2 gap-12">
                    <div class="flex flex-col gap-2 font-secondary text-justify">
                        <h2
                            class="w-full  text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-2">
                            NIN SPACE
                        </h2>
                        <p class="font-primary">
                            Nin Space menyediakan penyewaan berbagai pilihan ruang untuk beragam jenis
                            aktivitas Anda, baik indoor maupun outdoor. Nin Space dirancang dengan hati dan
                            hati-hati, serta dengan kesadaran akan sustainability untuk memberikan suasana
                            yang nyaman, hangat, dan hijau sehingga memicu mindset positif Anda.

                        </p>
                        <p class="font-primary">
                            Sebanyak 1000 lebih tanaman dengan 75 spesies turut menemani kegiatan dan
                            menyegarkan ruang. Nin Space dilengkapi dengan fasilitas internet wifi yang
                            cepat, air minum kangen water, dan area parkir yang luas. Kebersihan, keamanan,
                            dan kenyamanan Anda merupakan prioritas. Apapun kegiatannya, Nin Space
                            membuatnya terasa seperti di rumah.
                        </p>
                        <p class="font-primary">
                            Nin Space dapat diakses dengan mudah karena jaraknya yang dekat dengan
                            Stasiun KRL, MRT, TJ, dan pintu tol Bintaro.
                        </p>
                    </div>
                    <div>
                        <img src="../../../assets/front/image/nin1.jpg" class="w-full" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section id="oprasional" class="">
            <div class="container flex flex-col justify-center py-8">
                <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Tentang
                    Kami
                </h2>
                <div class="grid grid-cols-3 gap-4">
                    <button class="bg-primary-5 text-white font-primary rounded-2xl py-2 px-4">SHIFT 1 : 08:00 - 12:00 WIB</button>
                    <button class="bg-primary-5 text-white font-primary rounded-2xl py-2 px-4">SHIFT 1 : 08:00 - 12:00 WIB</button>
                    <button class="bg-primary-5 text-white font-primary rounded-2xl py-2 px-4">SHIFT 1 : 08:00 - 12:00 WIB</button>
                </div>
            </div>
        </section>
        <section id="oprasional" class="">
            <div class="container flex flex-col justify-center py-8">
                <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Kegiatan Di NIN SPACE
                </h2>
                <div class="flex flex-wrap justify-center">
                    <img src="../../../assets/front/image/Portofolio (1).png" alt="">
                </div>
            </div>
        </section>
</div>
@endsection