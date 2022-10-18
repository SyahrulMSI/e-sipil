<div class="deznav">
<div class="deznav-scroll">
    <ul class="metismenu" id="menu">
        <li><a href="{{ route('admin.dashboard.index') }}" class="ai-icon" aria-expanded="false">
            <i class="flaticon-381-networking"></i>
            <span class="nav-text">Dashboard</span>
            </a>
        </li>
        <li><a href="{{ route('admin.data_pelanggan.index') }}" class="ai-icon" aria-expanded="false">
            <i class="flaticon-381-controls-3"></i>
            <span class="nav-text">Data Pelanggan</span>
            </a>
        </li>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-television"></i>
            <span class="nav-text">Permohonan Layanan</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="./email-compose.html">List Permohonan</a></li>
            <li><a href="./chart-chartjs.html">DP Pemohon</a></li>
            <li><a href="./ecom-invoice.html">Cetak Permohonan</a></li>
            <!-- <li><a href="./app-profile.html">Registrasi</a></li> -->
        </ul>
    </li>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-heart"></i>
            <span class="nav-text">Data Petugas</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="./uc-select2.html">List Petugas</a></li>
        </ul>
    </li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-notepad"></i>
            <span class="nav-text">Data Survey</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="./form-element.html">List Lokasi Pemasangan</a></li> <!--****** berisi kondisi lokasi *******-->
            <li><a href="./form-wizard.html">List Waktu Pemasangan</a></li>
            <!-- <li><a href="./form-editor-summernote.html">Summernote</a></li>
            <li><a href="form-pickers.html">Pickers</a></li>
            <li><a href="form-validation-jquery.html">Jquery Validate</a></li> -->
        </ul>
    </li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-internet"></i>
        <span class="nav-text">Data Pemasangan</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{ route('admin.agenda_pemasangan.index') }}">Agenda Pemasangan</a></li>
        <li><a href="{{ route('admin.lokasi_pemasangan.index') }}">Lokasi Pemasangan</a></li>
        <li><a href="{{ route('admin.list_proyek.index') }}">List Proyek</a></li>
        <li><a href="{{ route('admin.acc_proyek.index') }}">Acc Proyek</a></li>
    </ul>
    </li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-network"></i>
            <span class="nav-text">Data Transaksi</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="table-bootstrap-basic.html">Pelunasan Dp</a></li> <!--****** struk bukti bayar *******-->
            <li><a href="table-datatable-basic.html">Cetak Bukti Pelunasan</a></li>
        </ul>
    </li>
    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
        <i class="flaticon-381-settings-2"></i>
            <span class="nav-text">Cetak Laporan Pelayanan</span> <!--****** bulanan dan tahunan *******-->
        </a>
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
