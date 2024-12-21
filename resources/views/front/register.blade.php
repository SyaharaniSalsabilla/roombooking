<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anihdhaloka</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="./output.css" rel="stylesheet">
    <link href="{{url('/assets/front/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-primary-2">
    <div class="w-full max-w-md p-6 space-y-2">
        <form class="space-y-2">
            <img src="../../../assets/front/image/Anindhaloka.png" class="mb-4" alt="">
            <input type="text" placeholder="Nama Depan"
                class="w-full text-center px-3 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
            <input type="text" placeholder="Nama Belakang"
                class="w-full text-center px-3 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
            <input type="email" placeholder="Email"
                class="w-full text-center px-3 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
            <input type="password" placeholder="Password"
                class="w-full text-center px-3 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
            <input type="password" placeholder="Konfirmasi Password"
                class="w-full text-center px-3 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">

            <div class="flex mt-4">
                <label class="flex items-start space-x-3 cursor-pointer group bg-red-50/50 p-4 rounded-md">
                    <div class="relative flex items-center">
                        <input type="radio" name="terms"
                            class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary-5 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-red-500 before:opacity-0 before:transition-opacity hover:before:opacity-10 checked:border-red-500 checked:before:bg-red-500" />
                        <div
                            class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-primary-5 opacity-0 transition-opacity peer-checked:opacity-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 16 16"
                                fill="currentColor">
                                <circle cx="8" cy="8" r="4" />
                            </svg>
                        </div>
                    </div>
                    <span class="text-sm text-gray-700">
                        Saya telah membaca dan menyetujui Ketentuan Layanan
                        danKebijakan Privasi
                        kami.
                    </span>
                </label>
            </div>

            <button type="submit"
                class="w-full bg-primary-5 text-primary-2 py-3 px-4 rounded-md font-medium hover:bg-red-700 transition-colors">
                Daftar
            </button>
            <div class="flex justify-center">
                <h2 class="text-xs text-center flex text-gray-500">Atau Lanjutkan Dengan?</h2>
            </div>
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
            <div class="flex justify-center">
                <form id="emailForm" action="{{route('login.email')}}" method="POST">@csrf</form>
                <BUtton type="submit" onClick="document.getElementById('emailForm').submit()">
                    <h2 class="text-xs text-center flex text-gray-500">Sudah Punya Akun? Masuk</h2></BUtton>
            </div>
        </form>
    </div>
</body>

</html>