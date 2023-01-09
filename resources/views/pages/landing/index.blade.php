@extends('layouts.landing')

@section('title', $title)

@push('before-style')

@endpush

@section('content')

<section class="banner-one" id="banner">
    <span class="banner-one__shape-1"></span>
    <span class="banner-one__shape-2"></span>
    <span class="banner-one__shape-3"></span>
    <span class="banner-one__shape-4"></span>
    <div class="container">
        <div class="banner-one__moc">
            <img src="{{ asset('landing/assets/images/mocs/banner-moc-1-1.png') }}" alt="Awesome Image" />
        </div><!-- /.banner-one__moc -->
        <div class="row">
            <div class="col-xl-6 col-lg-8">
                <div class="banner-one__content">

                    <h3 class="banner-one__title">Selamat Datang Di <br> <span>E</span>-SIPIL <br>PT. SUMBER SAE SATU</h3><!-- /.banner-one__title -->
                    <p class="banner-one__text">Selamat Menikmati Pelayanan Kami <br> Utamakan keselamatan dan jamin <br> kualitas kelistrikan anda.</p>
                    <!-- /.banner-one__text -->
                    <a href="#" class="banner-one__btn thm-btn "><span>Mulai</span></a><!-- /.thm-btn -->
                </div><!-- /.banner-one__content -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.banner-one -->
<section class="service-one" id="features">
    <div class="container">
        <div class="block-title text-center">
            <h2 class="block-title__title">Silahkan Pilih <span>Pelayanan</span> <br> Dari Kami.</h2><!-- /.block-title__title -->
        </div><!-- /.block-title -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1500ms">
                <div class="service-one__single text-center">
                    <div class="service-one__inner">
                        <i class="service-one__icon dimon-icon-laptop"></i>
                        <h3><a href="#">Pasar Meter <br> Listrik Baru</a></h3>
                        <p>Meter listrik pribadi<br> lebih aman <br> serta hemat.</p>
                        <a href="#" class="service-one__link"><i class="dimon-icon-right-arrow"></i></a>
                    </div><!-- /.service-one__inner -->
                </div><!-- /.service-one__single -->
            </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInDown" data-wow-duration="1500ms">
                <div class="service-one__single text-center">
                    <div class="service-one__inner">
                        <i class="service-one__icon dimon-icon-presentation"></i>
                        <h3><a href="#">Servis & Tambah<br> Daya Meter Listrik</a></h3>
                        <p>Tingkatkan kapasitas <br> daya listrik <br> untuk bisnis anda.</p>
                        <a href="#" class="service-one__link"><i class="dimon-icon-right-arrow"></i></a>
                    </div><!-- /.service-one__inner -->
                </div><!-- /.service-one__single -->
            </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1500ms">
                <div class="service-one__single text-center">
                    <div class="service-one__inner">
                        <i class="service-one__icon dimon-icon-target"></i>
                        <h3><a href="#">Instalasi Bangunan<br> Listrik Baru </a></h3>
                        <p>Terangi setiap ruangan <br> di dalam rumah <br> anda.</p>
                        <a href="#" class="service-one__link"><i class="dimon-icon-right-arrow"></i></a>
                    </div><!-- /.service-one__inner -->
                </div><!-- /.service-one__single -->
            </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInDown" data-wow-duration="1500ms">
                <div class="service-one__single text-center">
                    <div class="service-one__inner">
                        <i class="service-one__icon dimon-icon-visualization"></i>
                        <h3><a href="#">Servis <br> Instalasi Bangunan</a></h3>
                        <p>Instalasi bangunan aman <br> membuat suasana nyaman <br> dan hati lebih tenang.</p>
                        <a href="#" class="service-one__link"><i class="dimon-icon-right-arrow"></i></a>
                    </div><!-- /.service-one__inner -->
                </div><!-- /.service-one__single -->
            </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.service-one -->
<section class="cta-one" id="Benefit">
    <img src="{{ asset('landing/assets/images/background/cta-one-bg.png') }}" class="cta-one__bg" alt="Awesome Image" />
    <div class="container">
        <img src="{{ asset('landing/assets/images/mocs/cta-moc-1-1.png') }}" class="cta-one__moc" alt="Awesome Image" />
        <div class="row justify-content-lg-end">
            <div class="col-lg-6">
                <div class="cta-one__content">
                    <i class="cta-one__icon dimon-icon-data1"></i>
                    <div class="block-title text-left">
                        <h2 class="block-title__title">Manfaat <span>Pelayanan </span> PT. SUMBER SAE SATU.</h2><!-- /.block-title__title -->
                    </div><!-- /.block-title -->
                    <div class="cta-one__text">
                        <p>Beberapa keuntungan yang disediakan oleh PT. SUMBER SAE SATU.</p>
                    </div><!-- /.cta-one__text -->
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check"></i>Pemasangan meter listrik dengan proses yang cepat.</li>
                        <li><i class="fa fa-check"></i>Instalasi Kabel dan material listrik yang rapi dan ramah lingkungan.</li>
                        <li><i class="fa fa-check"></i>Transaksi pelayanan yang dapat dilakukan dimana saja.</li>
                    </ul><!-- /.list-unstyled -->
                    <a href="#" class="thm-btn"><span>Mulai</span></a>
                </div><!-- /.cta-one__content -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.cta-one -->
<section class="testimonials-one" id="testimonials">
    <div class="container">
        <div class="block-title text-center">
            <h2 class="block-title__title">Ulasan <span>Tokoh</span> serta <br> Masyarakat sekitar.</h2><!-- /.block-title__title -->
        </div><!-- /.block-title -->
        <div class="testimonials-one__carousel-outer">
            <div class="testimonials-one__carousel owl-carousel owl-theme">
                <div class="item">
                    <div class="testimonials-one__single">
                        <div class="testimonials-one__inner">
                            <p>Kami dengan senang hati melayani segala kebutuhan <br> dan masalah kelistrikan yang anda miliki. bukan hanya itu,  <br> kami juga siap melayani anda dalam kondisi darurat.</p>
                            <h3>Dedhi Nooriyanto</h3>
                            <span>Direktur PT. SUMBER SAE SATU</span>
                            <img src="{{ asset('landing/assets/images/resources/testi-1-1.png') }}" alt="Awesome Image" />
                        </div><!-- /.testimonials-one__inner -->
                    </div><!-- /.testimonials-one__single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="testimonials-one__single">
                        <div class="testimonials-one__inner">
                            <p>Pemasangan meter listrik yang rapi dan  <br> merupakan hasil dari ketelitian dan kesungguhan <br> dalam melakukan sebuah pekerjaan maupun kegiatan.</p>
                            <h3>Ahmad Nanto</h3>
                            <span>Pelanggan Pasang Baru</span>
                            <img src="{{ asset('landing/assets/images/resources/testi-1-3.png') }}" alt="Awesome Image" />
                        </div><!-- /.testimonials-one__inner -->
                    </div><!-- /.testimonials-one__single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="testimonials-one__single">
                        <div class="testimonials-one__inner">
                            <p>Suatu kemewahan rumah memang sangat penting bagi saya <br> kemewahan paling utama ada pada kualitas elektronik pada rumah<br> saya senang atas kualitas material <br>yang digunakan pada PT. SUMBER SAE SATU ini.</p>
                            <h3>Sunandar</h3>
                            <span>Pelanggan Instalasi Listrik - Perumahan</span>
                            <img src="{{ asset('landing/assets/images/resources/testi-1-2.png') }}" alt="Awesome Image" />
                        </div><!-- /.testimonials-one__inner -->
                    </div><!-- /.testimonials-one__single -->
                </div><!-- /.item -->
            </div><!-- /.testimonials-one__carousel -->
            <div class="testimonials-one__carousel__shape-one"></div><!-- /.testimonials-one__carousel__shape-one -->
            <div class="testimonials-one__carousel__shape-two"></div><!-- /.testimonials-one__carousel__shape-two -->
            <div class="testimonials-one__nav">
                <a class="testimonials-one__nav-left" href="#"><i class="dimon-icon-left-arrow"></i></a>
                <a class="testimonials-one__nav-right" href="#"><i class="dimon-icon-right-arrow"></i></a>
            </div><!-- /.testimonials-one__nav -->
        </div><!-- /.testimonials-one__carousel-outer -->
    </div><!-- /.container -->
</section><!-- /.testimonials-one -->
<section class="fact-one">
    <div class="container">
        <div class="block-title text-center">
            <h2 class="block-title__title">Rekap <span>Pelayanan</span> <br> dan jumlah Teknisi.</h2><!-- /.block-title__title -->
        </div><!-- /.block-title -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1000ms">
                <div class="fact-one__single">
                    <div class="fact-one__inner">
                        <h3 class="fact-one__count counter">176</h3><!-- /.fact-one__count counter -->
                        <p class="fact-one__text">Instalasi Baru</p><!-- /.fact-one__text -->
                    </div><!-- /.fact-one__inner -->
                </div><!-- /.fact-one__single -->
            </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1500ms">
                <div class="fact-one__single">
                    <div class="fact-one__inner">
                        <h3 class="fact-one__count counter">237</h3><!-- /.fact-one__count counter -->
                        <p class="fact-one__text">Servis Instalasi</p><!-- /.fact-one__text -->
                    </div><!-- /.fact-one__inner -->
                </div><!-- /.fact-one__single -->
            </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1500ms">
                <div class="fact-one__single">
                    <div class="fact-one__inner">
                        <h3 class="fact-one__count counter">54</h3><!-- /.fact-one__count counter -->
                        <p class="fact-one__text">Pasang Meter</p><!-- /.fact-one__text -->
                    </div><!-- /.fact-one__inner -->
                </div><!-- /.fact-one__single -->
            </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
            <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="1500ms">
                <div class="fact-one__single">
                    <div class="fact-one__inner">
                        <h3 class="fact-one__count counter">32</h3><!-- /.fact-one__count counter -->
                        <p class="fact-one__text">Servis Meter</p><!-- /.fact-one__text -->
                    </div><!-- /.fact-one__inner -->
                </div><!-- /.fact-one__single -->
            </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.fact-one -->
<section class="mailchimp-one" style="margin-top: 100px;" id=complain>
    <div class="container">
        <div class="block-title text-center">
            <h2 class="block-title__title">Ikuti Kami <br> Agar dapat melihat informasi terbaru.</h2><!-- /.block-title__title -->
        </div><!-- /.block-title -->

            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group d-flex justify-content-center">
                    <textarea name="komplain" class="form-control col-6" id="" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button type="button" class="thm-btn header__cta-btn fw-bold"><span>Kirim</span></button>
                </div>
            </form>

        <!-- <form action="#" class="mailchimp-one__mc-form mc-form" data-url="{{ url('https://xyz.us18.list-manage.com/subscribe/post?u=20e91746ef818cd941998c598&amp;id=cc0ee8140') }}e">
            <input type="text" class="form-control" placeholder="Silahkan komplain di sini !" style="min-height: 6rem; border: none;">
            <button type="submit"><i class="dimon-icon-right-arrow"></i>
            </button>
        </form> -->
        <div class="mc-form__response"></div><!-- /.mc-form__response -->
    </div><!-- /.container -->
</section ><!-- /.mailchimp-one -->
<div class="modal fade" id="login" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="rounded">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white" id="staticBackdropLabel">Silahkan Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('go') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="pasw">Password :</label>
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                            </div>
                            <a href="#">Lupa password ?</a>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="daftar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="rounded">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white" id="staticBackdropLabel">Buat Akun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}">
                                        @error('nama_lengkap')
                                            <small class="text">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Alamat Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="no_telp">Nomor Telepon / Whatsapp</label>
                                        <input type="number" class="form-control" name="no_telp" value="{{ old('no_telp') }}">
                                        @error('no_telp')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="psw">Password</label>
                                        <input type="password" name="password" class="form-control">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Buat Akun</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>



@endsection

@push('after-script')

@endpush
