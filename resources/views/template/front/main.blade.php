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

<body class="font-inter">
    <!-- header -->
     @include('template.front.header')
    <div id="app">
        @yield('content')
    </div>
    <!-- footer -->
    @include('template.front.footer')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>

    <script>
        $(document).ready(function () {

        });
    </script>

    <script>
        const modal = document.getElementById('modal');
        const openModal = document.querySelectorAll('.openModal')
        const closeModal = document.getElementById('closeModal');


        openModal.forEach(button => {
            button.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });
        });

        // Tutup modal (dari tombol close)
        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        // Tutup modal jika klik di luar modal
        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>
    <script>
        const modal2 = document.getElementById('modal2');
        const openModal2 = document.querySelectorAll('.openModal2')
        const closeModal2 = document.getElementById('closeModal2');


        openModal2.forEach(button => {
            button.addEventListener('click', () => {
                modal2.classList.remove('hidden');
            });
        });

        // Tutup modal (dari tombol close)
        closeModal2.addEventListener('click', () => {
            modal2.classList.add('hidden');
        });

        // Tutup modal jika klik di luar modal
        modal2.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal2.classList.add('hidden');
            }
        });
    </script>

</body>

</html>