<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') | PT. SUMBER SAE SATU</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('landing/assets/images/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('landing/assets/images/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('landing/assets/images/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('landing/assets/images/favicons/site.webmanifest') }}">

    @stack('before-style')
        @include('includes.landing.style')
    @stack('after-style')

</head>

<body>
    <div class="preloader">
        <img src="assets/images/resources/preloader.png" class="preloader__image" alt="">
    </div><!-- /.preloader -->
    <div class="page-wrapper">
        <header class="site-header site-header__header-one ">
            <x-TopLandingpages></x-TopLandingpages>
        </header><!-- /.site-header -->

        @yield('content')


        <x-FooterLanding></x-FooterLanding>

    </div><!-- /.page-wrapper -->


    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

    @stack('before-script')
        @include('includes.landing.script')
    @stack('after-style')

</body>

</html>
