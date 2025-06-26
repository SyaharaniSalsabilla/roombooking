<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anindhaloka</title>
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
        <span>{{ $errors->has('message') ? $errors->first('message') : ''}}</span>
        <form class="space-y-2" action="{{ route('register.post') }}" method="POST">
            @csrf
            <img src="../../../assets/front/image/Anindhaloka.png" class="mb-4" alt="">
            <input type="text" placeholder="Nama Depan" name="nama_depan" required
                class="w-full text-center px-3 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
            <input type="text" placeholder="Nama Belakang" name="nama_belakang" required
                class="w-full text-center px-3 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
            <input type="email" placeholder="Email" name="email" required
                class="w-full text-center px-3 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>
            <input type="password" placeholder="Kata Sandi" name="password" required
                class="w-full text-center px-3 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
            <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ''}}</span>
            <input type="password" placeholder="Konfirmasi Kata Sandi" name="password_konfirmasi" required
                class="w-full text-center px-3 py-3 bg-primary-1 border border-primary-5  rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">

            <!-- <div class="flex mt-4">
                <label class="flex items-start space-x-3 cursor-pointer group bg-red-50/50 p-4 rounded-md">
                    <div class="relative flex items-center">
                        <input type="radio" name="terms" required
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
                        dan Kebijakan Privasi
                        kami.
                    </span>
                </label>
            </div> -->

            <button type="submit"
                class="w-full bg-primary-5 text-primary-2 py-3 px-4 rounded-md font-medium hover:bg-red-700 transition-colors">
                Daftar
            </button>
            </form>
            <div class="flex justify-center">
                <form id="emailForm" action="{{route('login.customer')}}" method="GET"></form>
                <Button type="submit" onClick="document.getElementById('emailForm').submit()">
                    <h2 class="text-xs text-center flex text-gray-500">Sudah Punya Akun? Masuk</h2>
                </BUtton>
            </div>
    </div>
</body>

</html>