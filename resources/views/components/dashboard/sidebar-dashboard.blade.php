
<div class="deznav-scroll">
    <ul class="metismenu" id="menu">
        <li><a href="{{ route('admin.dashboard.index') }}" class="ai-icon" aria-expanded="false">
            <i class="flaticon-381-networking"></i>
            <span class="nav-text">Beranda</span>
            </a>
        </li>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-television"></i>
            <span class="nav-text">Permohonan Layanan</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('admin.list_permohonan.index') }}">List Permohonan</a></li>
            {{--  <li><a href="{{ route('admin.uang_muka_pemohon.index') }}">Uang Muka Pemohon</a></li>  --}}
            {{--  <li><a href="./ecom-invoice.html">Cetak Permohonan</a></li>  --}}
        </ul>
    </li>
    <li><a href="{{ route('admin.data_tugas.index') }}" class="ai-icon" aria-expanded="false">
        <i class="flaticon-381-controls-3"></i>
        <span class="nav-text">Data Tugas</span>
        </a>
    </li>
    {{--  <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-heart"></i>
            <span class="nav-text">Data Petugas</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="./uc-select2.html">List Petugas</a></li>
        </ul>
    </li>  --}}
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-internet"></i>
        <span class="nav-text">Data Pemasangan</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{ route('admin.agenda_pemasangan.index') }}">Agenda Pemasangan</a></li>
        {{--  <li><a href="{{ route('admin.lokasi_pemasangan.index') }}">Lokasi Pemasangan</a></li>  --}}
        {{--  <li><a href="{{ route('admin.list_proyek.index') }}">List Proyek</a></li>
        <li><a href="{{ route('admin.acc_proyek.index') }}">Persetujuan Proyek</a></li>  --}}
    </ul>
    </li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-network"></i>
            <span class="nav-text">Data Transaksi</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('admin.uang_muka.index') }}">Transaksi Uang Muka</a>
            <li><a href="{{ route('admin.pelunasan.index') }}">Transaksi Pelunasan</a></li> <!--****** struk bukti bayar *******-->
            {{--  <li><a href="{{ route('admin.invoice.index') }}">Cetak Invoice</a></li>  --}}
        </ul>
    </li>
    <li><a href="{{ route('admin.laporan.index') }}" class="ai-icon" aria-expanded="false">
        <i class="flaticon-381-settings-2"></i>
            <span class="nav-text">Cetak Laporan Transaksi</span> <!--****** bulanan dan tahunan *******-->
        </a>
    </li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-network"></i>
        <span class="nav-text">Data Pengguna</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{ route('admin.customer.index') }}">Pelanggan</a></li> <!--****** struk bukti bayar *******-->
        <li><a href="{{ route('admin.petugas.index') }}">Petugas</a></li>
        <li><a href="{{ route('admin.administrator.index') }}">Administrator</a></li>
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

