@extends('template.front.main')
@section('content')
<div id="app" class="bg-primary-2 flex flex-col p-8">
            <div class="container flex flex-col justify-center py-8 ">
                <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Kontak
                </h2>
                <div class="grid grid-cols-2 gap-12">
                    <div class="flex flex-col gap-2 font-secondary text-justify">
                        <h2 class="w-full font-primary font-semibold text-3xl text-primary-5 mb-2">
                            Ada yang bisa dibantu?
                        </h2>
                        @if(session('success'))
                            <div class="text-green-600 font-semibold mb-4">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('kontak.kirim') }}" method="POST">
                            @csrf
                            <div class="flex flex-col">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" required class="bg-primary-1 p-3 rounded-md mt-2" placeholder="Nama lengkap">
                            </div>
                            <div class="flex flex-col">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" required class="bg-primary-1 p-3 rounded-md mt-2" placeholder="Email aktif">
                            </div>
                            <div class="flex flex-col">
                                <label for="pesan">Saya Punya Pertanyaan </label>
                                <textarea name="pesan" id="pesan" rows="5" class="bg-primary-1 p-3 rounded-md mt-2" placeholder="Tuliskan pesan anda disini"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-primary-5 text-primary-2 px-6 py-3 rounded-lg text-center mt-4">Kirim</button>
                        </form>
                        <button class="bg-primary-5 text-primary-2 px-6 py-3 rounded-lg text-center">
                            <a href="">
                                <i class="fa-solid fa-phone mx-2"></i>
                            </a>
                            <a href="branding.anindhaloka@gmail.com">
                                <i class="fa-solid fa-envelope mx-2"></i>
                            </a>
                            <a href="">
                                 <i class="fa-brands fa-instagram mx-2"></i>
                            </a>
                        </button>
                    </div>
                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.194124888159!2d106.7629316!3d-6.267864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f155565238b1%3A0xbc7565c50318085d!2sJl.%20YRS%20No.20%2C%20RT.2%2FRW.1%2C%20Bintaro%2C%20Kec.%20Pesanggrahan%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012330!5e0!3m2!1sid!2sid!4v1234567890" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
    </div>
@endsection