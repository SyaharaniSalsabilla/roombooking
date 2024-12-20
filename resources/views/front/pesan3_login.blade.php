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
                            Buat akun atau masuk
                        </h2>
                        <div class="flex justify-center items-center bg-primary-1 rounded-lg">
                            <div class="w-full max-w-md p-6 space-y-2">

                                <button
                                    class="w-full bg-primary-5 text-white py-3 px-4 rounded-md font-medium hover:bg-red-500 transition-colors">
                                    Masuk dengan Email
                                </button>

                                <button
                                    class="w-full bg-primary-1 text-gray-700 py-3 px-4 rounded-md font-medium border border-primary-5 hover:bg-gray-50 transition-colors flex items-center justify-center space-x-2">
                                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                    <span>Lanjutkan dengan Facebook</span>
                                </button>

                                <button
                                    class="w-full bg-primary-1 text-gray-700 py-3 px-4 rounded-md font-medium border border-primary-5 hover:bg-gray-50 transition-colors flex items-center justify-center space-x-2">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24">
                                        <path fill="#EA4335"
                                            d="M5.266 9.765A7.077 7.077 0 0 1 12 4.909c1.69 0 3.218.6 4.418 1.582L19.91 3C17.782 1.145 15.055 0 12 0 7.27 0 3.198 2.698 1.24 6.65l4.026 3.115Z" />
                                        <path fill="#34A853"
                                            d="M16.04 18.013c-1.09.703-2.474 1.078-4.04 1.078a7.077 7.077 0 0 1-6.723-4.823l-4.04 3.067A11.965 11.965 0 0 0 12 24c2.933 0 5.735-1.043 7.834-3l-3.793-2.987Z" />
                                        <path fill="#4A90E2"
                                            d="M19.834 21c2.195-2.048 3.62-5.096 3.62-9 0-.71-.109-1.473-.272-2.182H12v4.637h6.436c-.317 1.559-1.17 2.766-2.395 3.558L19.834 21Z" />
                                        <path fill="#FBBC05"
                                            d="M5.277 14.268A7.12 7.12 0 0 1 4.909 12c0-.782.125-1.533.357-2.235L1.24 6.65A11.934 11.934 0 0 0 0 12c0 1.92.445 3.73 1.237 5.335l4.04-3.067Z" />
                                    </svg>
                                    <span>Lanjutkan dengan Google</span>
                                </button>

                                <p class="text-gray-400 text-center text-xs">Belum Punya Akun?</p>
                                <!-- Register Link -->
                                <div class="text-center">
                                    <a href="register.html"
                                        class="text-primary-5 hover:text-red-700 text-sm font-medium">
                                        Daftar sekarang
                                    </a>
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