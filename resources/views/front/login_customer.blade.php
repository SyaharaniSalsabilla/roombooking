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
    <div class="w-full max-w-md p-6 space-y-2">
        <form class="space-y-3" action="{{ route('login.post.customer')}}" method="POST">
            @csrf
            <img src="../../../assets/front/image/Anindhaloka.png" alt="">
            <!-- Email Input -->
            <div class="relative">
                <input type="email" placeholder="Email" name="email"
                    class="w-full pl-10 pr-4 py-3 bg-primary-1 
                    border border-primary-5  rounded-md text-primary-5 
                    placeholder-gray-500 focus:outline-none focus:ring-2 
                    focus:ring-red-500 focus:border-transparent form-control">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-primary-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                </div>
            </div>

            <!-- Password Input -->
            <div class="relative">
                <input type="password" placeholder="Password" name="password"
                    class="w-full pl-10 pr-4 py-3 bg-primary-1 border border-primary-5 
                    rounded-md text-primary-5 placeholder-gray-500 focus:outline-none 
                    focus:ring-2 focus:ring-red-500 focus:border-transparent form-control">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-primary-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full bg-primary-5 text-primary-2 py-3 px-4 rounded-md font-medium hover:bg-red-700 transition-colors">
                MASUK
            </button>
            <div class="flex justify-end">
                <p class="text-xs text-left flex text-gray-500">lupa password?</p>
            </div>
        </form>
    </div>
    </body>
</html>
