<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    {{-- remix icons --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    {{-- swipper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" bg-cus_gray antialiased">
    <x-nav-info />
    <x-nav />
    <div class=" mx-auto">
        {{ $slot }}
    </div>
    <x-footer />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    {{-- swipper --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var swiper = new Swiper(".brandSwiper", {
            spaceBetween: 30,

            loop: true,
            draggable: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 4,
                },
                768: {
                    slidesPerView: 8,
                },

            },
        });

        $(document).ready(function() {
            $('#toggle').click(function() {
                var menu = $('#menu');
                if ($('#menu').hasClass('h-0')) {
                    menu.addClass('h-[110px]')
                    menu.removeClass('h-0')
                } else {
                    menu.addClass('h-0')
                    menu.removeClass('h-[110px]')

                }
            })

            var date = new Date()
            $('#year').text(date.getFullYear())


            var navbar = $('#navbar')

            $(window).on('scroll', function() {
                if ($(this).scrollTop() >= 100) {
                    navbar.removeClass('py-6')
                    navbar.addClass('py-4')
                } else {
                    navbar.removeClass('py-4')
                    navbar.addClass('py-6')
                }
            })


        });
    </script>

    @yield('script')

</body>

</html>
