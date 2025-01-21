<!DOCTYPE html>
<html lang="en">
<head>
    <!--=== Required meta tags ===-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>@yield('title', 'Default Title')</title>
    <meta name="description" content="@yield('description', 'Default description of your site.')">
    <meta name="keywords" content="@yield('keywords', 'Laravel, PHP, Full Stack, Developer')">

    <!--=== custom css ===-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}" /> --}}
    <link rel="shortcut icon" type="image/ico" href="{{ asset('assets/images/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    @stack("style")

    <!--=== custom css ===-->
    <title>@yield('title', 'Portfolio')</title>
  </head>
  <body>

        @include('frontend.layouts.navbar')

        @yield('content')

        @include('frontend.layouts.footer')

        @stack("script")

        <!--=== Optional JavaScript ===-->

        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        {{-- <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script> --}}
        <script src="{{ asset('assets/js/SmoothScroll.min.js') }}"></script>
        <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
        <script src="{{ asset('assets/js/ityped.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <script src="{{ asset('assets/js/aos.js') }}"></script>
        <script>
            AOS.init({
                delay: 100, // values from 0 to 3000, with step 50ms
                duration: 700, // values from 0 to 3000, with step 50ms
            });

        </script>
        <script type="text/javascript">
            $('[data-aos]').parent().addClass('.extra_space_aos');
        </script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!--=== Optional JavaScript ===-->
      </body>

    </html>
