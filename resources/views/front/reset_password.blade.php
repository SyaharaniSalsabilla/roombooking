
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
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <img src="../../../assets/front/image/Anindhaloka.png" alt="">
            @if ($errors->any())
                <div class="text-red-500 text-sm">
                    @foreach ($errors->all() as $error)
                        <p>• {{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <input type="hidden" name="email" value="{{ old('email', $user->email) }}">
            <!-- password baru -->
            <div class="relative">
                <input type="password" placeholder="Kata Sandi Baru" name="password" autocomplete="new-password"
                    class="mt-4 w-full pl-10 pr-4 py-3 bg-primary-1 border border-primary-5 rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent form-control" 
                    >
            </div>

            <!-- confirm password baru -->
            <div class="relative">
                <input type="password" placeholder="Konfirmasi Kata Sandi Baru" name="password_confirmation"  autocomplete="new-password"
                    class="mt-4 w-full pl-10 pr-4 py-3 bg-primary-1 border border-primary-5 rounded-md text-primary-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent form-control"
                    >
            </div>

            <button type="submit"
                class="mt-4 w-full bg-primary-5 text-primary-2 py-3 px-4 rounded-md font-medium hover:bg-red-700 transition-colors">
                Kirim
            </button>
        </form>
    </div>
    </body>
</html>
