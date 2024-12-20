@extends('template.front.main')
@section('content')
<div id="app" class="bg-primary-2">
        <section id="hiro" class=" mb-6">
            <div class="container flex flex-col justify-center py-8">
                <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Kontak
                </h2>
                <div class="grid grid-cols-2 gap-12">
                    <div class="flex flex-col gap-2 font-secondary text-justify">
                        <h2 class="w-full font-primary font-semibold text-3xl text-primary-5 mb-2">
                            Ada yang bisa dibantu?
                        </h2>
                        <div class="flex flex-col">
                            <label for="">Saya Punya Pertanyaan / Feedback</label>
                            <textarea name="" id="" rows="5" class="bg-primary-1 p-3 rounded-md mt-2" placeholder="Tuliskan pesan anda disini"></textarea>
                        </div>
                        <button class="bg-primary-5 text-primary-2 px-6 py-3 rounded-lg text-center">Kirim</button>
                        <button class="bg-primary-5 text-primary-2 px-6 py-3 rounded-lg text-center">
                            <i class="fa-solid fa-phone mx-2"></i>
                            <i class="fa-solid fa-envelope mx-2"></i>
                            <i class="fa-brands fa-instagram mx-2"></i>
                        </button>
                    </div>
                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126646.25766563421!2d112.63028071749854!3d-7.275441715311461!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf8381ac47f%3A0x3027a76e352be40!2sSurabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1734591253507!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection