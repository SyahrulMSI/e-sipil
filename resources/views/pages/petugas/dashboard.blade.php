@extends('layouts.petugas')

@section('title', $title)

@section('content')
<div class="col-xl-6 col-xxl-12">
    <div class="row">
        <div class="col-sm-6">
            <div class="card avtivity-card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <span class="activity-icon bgl-success mr-md-4 mr-3">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip2)">
                                <path d="M14.6406 24.384C14.4639 24.1871 14.421 23.904 14.5305 23.6633C15.9635 20.513 14.4092 18.7501 14.564 11.6323C14.5713 11.2944 14.8346 10.9721 15.2564 10.9801C15.6201 10.987 15.905 11.2962 15.8971 11.6598C15.8902 11.9762 15.8871 12.2939 15.8875 12.6123C15.888 12.9813 16.1893 13.2826 16.5583 13.2776C17.6426 13.2628 19.752 12.9057 20.5684 10.4567L20.9744 9.23876C21.7257 6.9847 20.4421 4.55115 18.1335 3.91572L13.9816 2.77294C12.3274 2.31768 10.5363 2.94145 9.52387 4.32498C4.66826 10.9599 1.44452 18.5903 0.0754914 26.6727C-0.300767 28.8937 0.754757 31.1346 2.70222 32.2488C13.6368 38.5051 26.6023 39.1113 38.35 33.6379C39.3524 33.1709 40.0002 32.1534 40.0002 31.0457V19.1321C40.0002 18.182 39.5322 17.2976 38.7484 16.7664C34.5339 13.91 29.1672 14.2521 25.5723 18.0448C25.2519 18.3828 25.3733 18.937 25.8031 19.1166C27.4271 19.7957 28.9625 20.7823 30.2439 21.9475C30.5225 22.2008 30.542 22.6396 30.2654 22.9155C30.0143 23.1658 29.6117 23.1752 29.3485 22.9376C25.9907 19.9053 21.4511 18.5257 16.935 19.9686C16.658 20.0571 16.4725 20.3193 16.477 20.61C16.496 21.8194 16.294 22.9905 15.7421 24.2172C15.5453 24.6544 14.9607 24.7409 14.6406 24.384Z" fill="#27BC48"/>
                                </g>
                                <defs>
                                <clipPath id="clip2">
                                <rect width="40" height="40" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>
                        </span>
                        <div class="media-body">
                            <p class="fs-14 mb-2">Tugas Saat Ini</p>
                            <span class="title text-black font-w600">{{ $tugas }}</span>
                        </div>
                    </div>
                </div>
                <div class="effect bg-success"></div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card avtivity-card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <span class="activity-icon bgl-secondary  mr-md-4 mr-3">
                            <svg width="40" height="37" viewBox="0 0 40 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.64826 26.5285C0.547125 26.7394 -0.174308 27.8026 0.0366371 28.9038C0.222269 29.8741 1.07449 30.5491 2.02796 30.5491C2.15453 30.5491 2.28531 30.5364 2.41188 30.5112L10.7653 28.908C11.242 28.8152 11.6682 28.5578 11.9719 28.1781L15.558 23.6554L14.3599 23.0437C13.4739 22.5965 12.8579 21.7865 12.6469 20.8035L9.26338 25.0688L1.64826 26.5285Z" fill="#A02CFA"/>
                                <path d="M31.3999 8.89345C33.8558 8.89345 35.8467 6.90258 35.8467 4.44673C35.8467 1.99087 33.8558 0 31.3999 0C28.9441 0 26.9532 1.99087 26.9532 4.44673C26.9532 6.90258 28.9441 8.89345 31.3999 8.89345Z" fill="#A02CFA"/>
                                <path d="M21.6965 3.33297C21.2282 2.85202 20.7937 2.66217 20.3169 2.66217C20.1439 2.66217 19.971 2.68748 19.7853 2.72967L12.1534 4.53958C11.0986 4.78849 10.4489 5.84744 10.6979 6.89795C10.913 7.80079 11.7146 8.40831 12.6048 8.40831C12.7567 8.40831 12.9086 8.39144 13.0605 8.35347L19.5618 6.81357C19.9837 7.28187 22.0974 9.57273 22.4813 9.97775C19.7938 12.855 17.1064 15.7281 14.4189 18.6054C14.3767 18.6519 14.3388 18.6982 14.3008 18.7446C13.5161 19.7445 13.7566 21.3139 14.9379 21.9088L23.1774 26.1151L18.8994 33.0467C18.313 34.0002 18.6083 35.249 19.5618 35.8396C19.8951 36.0464 20.2621 36.1434 20.6249 36.1434C21.3042 36.1434 21.9707 35.8017 22.3547 35.1815L27.7886 26.3766C28.0882 25.8915 28.1683 25.305 28.0122 24.7608C27.8561 24.2123 27.4806 23.7567 26.9702 23.4993L21.3885 20.66L27.2571 14.3823L31.6869 18.1371C32.0539 18.4493 32.5054 18.6012 32.9526 18.6012C33.4335 18.6012 33.9145 18.424 34.2899 18.078L39.3737 13.3402C40.1669 12.6019 40.2133 11.3615 39.475 10.5684C39.0868 10.1549 38.5637 9.944 38.0406 9.944C37.5638 9.944 37.0829 10.117 36.7074 10.4671L32.9019 14.0068C32.8977 14.011 23.363 5.04163 21.6965 3.33297Z" fill="#A02CFA"/>
                            </svg>
                        </span>
                        <div class="media-body">
                            <p class="fs-14 mb-2">Riwayat Tugas</p>
                            <span class="title text-black font-w600">{{ $t_selesai }}</span>
                        </div>
                    </div>
                </div>
                <div class="effect bg-secondary"></div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card avtivity-card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <span class="activity-icon bgl-danger mr-md-4 mr-3">
                            <svg width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.0977 7.90402L9.78535 16.7845C9.17929 17.6683 9.40656 18.872 10.2862 19.4738L18.6574 25.2104V30.787C18.6574 31.8476 19.4992 32.7357 20.5598 32.7568C21.6456 32.7735 22.5295 31.9023 22.5295 30.8207V24.1961C22.5295 23.5564 22.2138 22.9588 21.6877 22.601L16.3174 18.9184L20.8376 14.1246L23.1524 19.3982C23.4596 20.101 24.1582 20.5556 24.9243 20.5556H31.974C33.0346 20.5556 33.9226 19.7139 33.9437 18.6532C33.9605 17.5674 33.0893 16.6835 32.0076 16.6835H26.1953C25.4293 14.9411 24.6128 13.2155 23.9015 11.4478C23.5395 10.5556 23.3376 10.1684 22.6726 9.55389C22.5379 9.42763 21.5993 8.56904 20.7618 7.80305C19.9916 7.10435 18.8047 7.15065 18.0977 7.90402Z" fill="#FF3282"/>
                                <path d="M26.0269 8.87206C28.4769 8.87206 30.463 6.88598 30.463 4.43603C30.463 1.98608 28.4769 0 26.0269 0C23.577 0 21.5909 1.98608 21.5909 4.43603C21.5909 6.88598 23.577 8.87206 26.0269 8.87206Z" fill="#FF3282"/>
                                <path d="M8.16498 38.388C12.6744 38.388 16.33 34.7325 16.33 30.2231C16.33 25.7137 12.6744 22.0581 8.16498 22.0581C3.65559 22.0581 0 25.7137 0 30.2231C0 34.7325 3.65559 38.388 8.16498 38.388Z" fill="#FF3282"/>
                                <path d="M31.835 38.388C36.3444 38.388 40 34.7325 40 30.2231C40 25.7137 36.3444 22.0581 31.835 22.0581C27.3256 22.0581 23.67 25.7137 23.67 30.2231C23.67 34.7325 27.3256 38.388 31.835 38.388Z" fill="#FF3282"/>
                            </svg>
                        </span>
                        <div class="media-body">
                            <p class="fs-14 mb-2">Daily Cycling</p>
                            <span class="title text-black font-w600">230 Km</span>
                        </div>
                    </div>
                    <div class="progress" style="height:5px;">
                        <div class="progress-bar bg-danger" style="width: 90%; height:5px;" role="progressbar">
                            <span class="sr-only">42% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="effect bg-danger"></div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-6 col-xxl-12">
    <div class="card">
        <div class="card-header d-sm-flex d-block pb-0 border-0">
            <div class="mr-auto pr-3 mb-sm-0 mb-3">
                <h4 class="text-black fs-20">SOP</h4>
                <p class="fs-13 mb-0 text-black">Lorem ipsum dolor sit amet, consectetur</p>
            </div>
        </div>
        <div class="card-body pt-0 pb-0">

            <div class="row d-flex justify-content-center">
                <img src="{{ asset('img/sop.png') }}" class="img-fluid rounded" alt="">
            </div>

        </div>
    </div>
</div>
<div class="col-xl-9 col-xxl-8">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header bg-primary d-sm-flex d-block pb-0 border-0">

                 <h3 class="text-white mb-4">Tugas - tugas instalasi dan maintenance</h3>

                </div>
                <div class="card-body pt-2">

                        <ul class="text-dark">
                            <li><i class="fa fa-circle text-dark"></i> Merencanakan order peralatan yang berkaitan dengan kebutuhan listrik, telephone, AC, dan air</li>
                            <li><i class="fa fa-circle text-dark"></i> Pengadaan peralatan yang berkaitan dengan kebutuhan listrik, telephone, AC, dan air</li>
                            <li><i class="fa fa-circle text-dark"></i> Melakukan perawatan pergantian lampu berkala (per semester) seluruh gedung</li>
                            <li><i class="fa fa-circle text-dark"></i> Melakukan perawatan water pump secara berkala (per tiga bulan)</li>
                            <li><i class="fa fa-circle text-dark"></i> Melakukan perawatan AC secara berkala (per semester) general cleaner</li>
                            <li><i class="fa fa-circle text-dark"></i> Melakukan perawatan telephone secara berkala setiap enam bulan sekali</li>
                            <li><i class="fa fa-circle text-dark"></i> Menangani perbaikan yang bersifat periodik dan emergency</li>
                            <li><i class="fa fa-circle text-dark"></i> Membuat jaringan dan instalansi gedung jika perlukan</li>
                            <li><i class="fa fa-circle text-dark"></i> Melakukan pencatatan meter listrik yang terkait dengan asset universitas yang disewakan</li>
                            <li><i class="fa fa-circle text-dark"></i> Membuat rekening tagihan (kontribusi) penggunaan listrik</li>
                            <li><i class="fa fa-circle text-dark"></i> Melakukan pengecekkan pembayaran rekening listrik, air, dan telephone setiap bulannya dari keuangan</li>
                            <li><i class="fa fa-circle text-dark"></i> Mengkoordinasikan pembagian tugas dalam tim</li>
                            <li><i class="fa fa-circle text-dark"></i> Membuat laporan secara periodik sebagai evaluasi</li>
                        </ul>

                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-sm-flex d-block pb-0 border-0">
                    <div class="mr-auto pr-3">
                        <h4 class="text-black fs-20 font-w600">Calories Chart</h4>
                        <p class="fs-13 mb-0 text-black">Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                    <div class="dropdown mt-sm-0 mt-3">
                        <button type="button" class="btn rounded btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Weekly
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javascript:void(0);">Link 1</a>
                            <a class="dropdown-item" href="javascript:void(0);">Link 2</a>
                            <a class="dropdown-item" href="javascript:void(0);">Link 3</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chartTimeline"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-xxl-4">
    <div class="row">
        <div class="col-xl-12">
            <div class="card featuredMenu">
                <div class="card-header border-0">
                    <h4 class="text-black font-w600 fs-20 mb-0">Featured Diet Menu</h4>
                </div>
                <div class="card-body loadmore-content height750 dz-scroll pt-0" id="FeaturedMenusContent">
                    <div class="media mb-4">
                        <img src="images/menus/1.png" width="85" alt="" class="rounded mr-3">
                        <div class="media-body">
                            <h5><a href="food-menu.html" class="text-black fs-16">Chinese Orange Fruit With Avocado Salad</a></h5>
                            <span class="fs-14 text-primary font-w500">Kevin Ignis</span>
                        </div>
                    </div>
                    <ul class="d-flex flex-wrap pb-2 border-bottom mb-3 justify-content-between">
                        <li class="mr-3 mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                        <li class="mb-2"><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">176 Reviews</span></li>
                    </ul>
                    <div class="media mb-4">
                        <img src="images/menus/2.png" width="85" alt="" class="rounded mr-3">
                        <div class="media-body">
                            <h5><a href="food-menu.html" class="text-black fs-16">Fresh or Frozen (No Sugar Added) Fruits</a></h5>
                            <span class="fs-14 text-primary font-w500">Olivia Johanson</span>
                        </div>
                    </div>
                    <ul class="d-flex flex-wrap pb-2 border-bottom mb-3 justify-content-between">
                        <li class="mr-3 mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                        <li class="mb-2"><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">176 Reviews</span></li>
                    </ul>
                    <div class="media mb-4">
                        <img src="images/menus/3.png" width="85" alt="" class="rounded mr-3">
                        <div class="media-body">
                            <h5><a href="food-menu.html" class="text-black fs-16">Fresh or Frozen (No Sugar Added) Fruits</a></h5>
                            <span class="fs-14 text-primary font-w500">Stefanny Raharjo</span>
                        </div>
                    </div>
                    <ul class="d-flex flex-wrap pb-2 border-bottom mb-3 justify-content-between">
                        <li class="mr-3 mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                        <li class="mb-2"><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">176 Reviews</span></li>
                    </ul>
                    <div class="media mb-4">
                        <img src="images/menus/4.png" width="85" alt="" class="rounded mr-3">
                        <div class="media-body">
                            <h5><a href="food-menu.html" class="text-black fs-16">Original Boiled Egg with Himalaya Salt</a></h5>
                            <span class="fs-14 text-primary font-w500">Peter Parkur</span>
                        </div>
                    </div>
                    <ul class="d-flex flex-wrap pb-2 border-bottom mb-3 justify-content-between">
                        <li class="mr-3 mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
                        <li class="mb-2"><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">176 Reviews</span></li>
                    </ul>
                </div>
                <div class="card-footer style-1 text-center border-0 pt-0 pb-4">
                    <a class="text-primary dz-load-more fa fa-chevron-down" id="FeaturedMenus" href="javascript:void(0);" rel="ajax/featured-menu-list.html">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
