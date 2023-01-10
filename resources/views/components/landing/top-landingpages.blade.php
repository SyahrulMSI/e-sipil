<nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
    <div class="container clearfix">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="logo-box clearfix">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('landing/assets/images/resources/logo-dark.png') }}" class="main-logo" width="150" alt="Awesome Image" />
            </a>
            <button class="menu-toggler" data-target=".main-navigation">
                <span class="fa fa-bars"></span>
            </button>
        </div><!-- /.logo-box -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="main-navigation">
            <ul class=" one-page-scroll-menu navigation-box">
                <li class="current scrollToLink">
                    <a href="/">Beranda</a>
                </li>
                <li class="scrollToLink">
                    <a href="#features">Fitur</a>
                </li>
                <li class="scrollToLink">
                    <a href="#Benefit">Keuntungan</a>
                </li>
                <li class="scrollToLink">
                    <a href="#testimonials">Dokumentasi</a>
                </li>
                <li class="scrollToLink">
                    <a href="#complain">Pengaduan</a>
                </li>
                <li class="scrollToLink">
                    @if(!empty(Auth::user()))
                    <a href="#news">{{ Auth::user()->nama_lengkap }}</a>
                    @else
                    <a href="#news">Masuk / Daftar</a>
                    @endif
                    <ul class="sub-menu">
                        @if (!empty(Auth::user()->role))

                        {{--  <div class="right-side-box">  --}}
                            @if (Auth::user()->role == 1)
                            <li>  <a href="{{ route('admin.dashboard.index') }}"><span>Dashboard</span></a></li>
                            @elseif (Auth::user()->role == 2)
                             <li> <a href="#"><span>Dashboard</span></a></li>
                            @elseif(    Auth::user()->role == 3)
                                <li><a href="{{ route('customer.dashboard.index') }}"><span>Dashboard</span></a></li>
                            @endif
                        {{--  </div>  --}}
                        <!-- /.right-side-box -->

                    @else

                        {{--  <div class="right-side-box">  --}}
                               <li>
                                <a href="#"  data-toggle="modal" data-target="#login"><span>Masuk</span></a>
                               </li>
                               <li>
                                <a href="#"  data-toggle="modal" data-target="#daftar"><span>Daftar</span></a>
                               </li>
                        {{--  </div>  --}}
                            <!-- /.right-side-box -->

                    @endif
                    </ul><!-- /.sub-menu -->
                </li>



            </ul>
        </div><!-- /.navbar-collapse -->


    </div>
    <!-- /.container -->
</nav>




