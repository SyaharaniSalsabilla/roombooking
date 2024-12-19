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

    <script src="{{ asset('static/website/new/vendor/jquery.2.2.3.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('static/website/new/vendor/popper.js/popper.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr("#date-range", {
                mode: "range",
                dateFormat: "d/m/Y",
                placeholder: "Tanggal Awal - Tanggal Akhir",
                onClose: function (selectedDates, dateStr, instance) {
                    if (selectedDates.length === 2) {
                        console.log("Selected date range:", dateStr);
                    }
                }
            });
        });
    </script>

</body>

</html>