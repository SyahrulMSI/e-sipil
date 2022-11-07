<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{ route('petugas.dashboard.index') }}" class="ai-icon" aria-expanded="false">
                <i class="flaticon-381-networking"></i>
                <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('petugas.list_tugas.index') }}" class="ai-icon" aria-expanded="false">
                <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Data Permohonan</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-381-network"></i>
                <span class="nav-text">Data Transaksi</span>
            </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('customer.transaksi_dp.index') }}">Dp</a></li>
                    <li><a href="{{ route('customer.transaksi_pelunasan.index') }}">Pelunasan</a></li>
                </ul>
            </li>
        </ul>
        <div class="add-menu-sidebar">
            <img src="{{ asset('dashboard/images/cv.png') }}" alt="" class="mr-2" width="100%" style="box-shadow: 5px 5px 5px #333; border-radius: 10px 10px 10px 10px">
            <!-- <p class="	font-w500 mb-0">Create Workout Plan Now</p> -->
        </div>
        <div class="copyright">
            <p><strong>STEAM TECH</strong> © 2022 All Rights Reserved</p>
            <!-- <p>Made with <span class="heart"></span> by DexignZone</p> -->
        </div>
    </div>
    </div>
