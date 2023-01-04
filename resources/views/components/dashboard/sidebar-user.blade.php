
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{ route('customer.dashboard.index') }}" class="ai-icon" aria-expanded="false">
                <i class="flaticon-381-networking"></i>
                <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-381-television"></i>
                <span class="nav-text">Daftar Layanan</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('customer.pasang_meter_baru.index') }}">Pasang Meter Baru</a></li>
                    <li><a href="{{ route('customer.service_meter_listrik.index') }}">Servis Meter Listrik</a></li>
                    <li><a href="{{ route('customer.tambah_daya_listrik.index') }}">Tambah Daya Listrik</a></li>
                    <li><a href="{{ route('customer.instalasi_bangunan_baru.index') }}">Instalasi Banguna Baru</a></li>
                    <li><a href="{{ route('customer.service_listrik_bangunan.index') }}">Servis Listrik Bangunan</a></a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('customer.daftar_permohonan.index') }}" class="ai-icon" aria-expanded="false">
                <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Data Permohonan</span>
                </a>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-381-television"></i>
                <span class="nav-text">Data Pemasangan</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('customer.agenda_pemasangan.index') }}">Agenda Pemasangan</a></li>
                    <li><a href="{{ route('customer.history.index') }}">History</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('customer.progress.index') }}" class="ai-icon" aria-expanded="false">
                <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Progress Pemasangan</span>
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

