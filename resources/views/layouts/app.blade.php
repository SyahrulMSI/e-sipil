<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title') | PT. SUMBER SAE SATU</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard/images/favicon.png') }}">
	@stack('before-style')
        @include('includes.styles')
    @stack('after-style')
</head>
<body>


    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">


            <x-NavHeader></x-NavHeader>

        <div class="header">
            <div class="header-content">
                <x-TopbarDashboard></x-TopbarDashboard>
            </div>
        </div>


           <x-SidebarDashboard></x-SidebarDashboard>


        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">

                        @yield('content')

				</div>
            </div>
        </div>

        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2020</p>
            </div>
        </div>



    </div>


        @stack('before-script')
            @include('includes.scripts')

            <script>
                function carouselReview(){
                    /*  testimonial one function by = owl.carousel.js */
                    jQuery('.testimonial-one').owlCarousel({
                        loop:true,
                        autoplay:true,
                        margin:30,
                        nav:false,
                        dots: false,
                        left:true,
                        navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
                        responsive:{
                            0:{
                                items:1
                            },
                            484:{
                                items:2
                            },
                            882:{
                                items:3
                            },
                            1200:{
                                items:2
                            },

                            1540:{
                                items:3
                            },
                            1740:{
                                items:4
                            }
                        }
                    })
                }
                jQuery(window).on('load',function(){
                    setTimeout(function(){
                        carouselReview();
                    }, 1000);
                });
            </script>

        @stack('after-script')

</body>
</html>
