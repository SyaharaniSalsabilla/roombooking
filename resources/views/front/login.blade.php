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
        
        <img src="../../../assets/front/image/Anindhaloka.png" alt="" >
        <form id="emailForm" action="{{route('login.email')}}" method="GET"></form>
        <button type="submit" onClick="document.getElementById('emailForm').submit()"
            class="w-full bg-primary-5 text-white py-3 px-4 rounded-md font-medium hover:bg-red-500 transition-colors">
            Masuk dengan Email
        </button>

        <p class="text-gray-400 text-center text-xs">Belum Punya Akun?</p>
        <!-- Register Link -->
        <div class="text-center">
            <form id="emailForm" action="{{route('login.email')}}" method="GET"></form>
            <a href="register.html" class="text-primary-5 hover:text-red-700 text-sm font-medium">
                Daftar sekarang
            </a>
        </div>
    </div>
</body>
</html>
