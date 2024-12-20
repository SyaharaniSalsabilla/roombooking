<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anindhaloka</title>
    {{-- @vite(['../../js/app.js']) --}} 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="{{url('/assets/front/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
    <body class="min-h-screen flex items-center justify-center bg-primary-2">
        <div class="w-full max-w-md p-6 space-y-4">
           
                <img src="../../../assets/front/image/Anindhaloka.png" alt="" >
                <form id="emailForm" action="{{route('login.email')}}" method="POST">@csrf</form>
                <button type="submit" onClick="document.getElementById('emailForm').submit()"
                    class="w-full bg-primary-5 text-white py-3 px-4 rounded-md font-medium hover:bg-red-500 transition-colors">
                    Masuk dengan Email
                </a>

                <button
                    class="w-full bg-primary-1 text-gray-700 py-3 px-4 rounded-md font-medium border border-primary-5 hover:bg-gray-50 transition-colors flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                    <span>Lanjutkan dengan Facebook</span>
                </button>

                <button
                    class="w-full bg-primary-1 text-gray-700 py-3 px-4 
                    rounded-md font-medium border border-primary-5 
                    hover:bg-gray-50 transition-colors flex items-center 
                    justify-center space-x-2"
                >
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
                    <a href="register.html" class="text-primary-5 hover:text-red-700 text-sm font-medium">
                        Daftar sekarang
                    </a>
                </div>
           
        </div>
    </body>
</html>
