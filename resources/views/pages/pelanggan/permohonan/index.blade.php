@extends('layouts.customer')

@section('title', $title)

@push('after-style')

@endpush

@section('content')


        <div class="col-xl-12">



            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white">Daftar Permohonan Layanan</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="pmb-tab" data-toggle="tab" href="#pmb" role="tab" aria-controls="pmb"
                                    aria-selected="true">Pasang Meter Baru</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="tdl-tab" data-toggle="tab" href="#tdl" role="tab" aria-controls="tdl"
                                    aria-selected="false">Tambah Daya Listrik</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="ib-tab" data-toggle="tab" href="#ib" role="tab" aria-controls="ib"
                                    aria-selected="false">Instalasi Bangunan <i class="mdi mdi-book-arrow-up-outline:"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="service-tab" data-toggle="tab" href="#service" role="tab" aria-controls="service"
                                      aria-selected="false">Service Meter Listrik / Listrik Bangunan<i class="mdi mdi-book-arrow-up-outline:"></i></a>
                                </li>
                            </ul>


                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="pmb" role="tabpanel" aria-labelledby="pmb-tab">
                                   <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="pmb_t" class="display min-w850 text-center" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nomor Registrasi</th>
                                                            <th>Tanggal Permohonan</th>
                                                            <th>Jenis Pemasangan</th>
                                                            <th>Daya</th>
                                                            <th>Lokasi Pemasangan</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                        @php
                                                            $n=1;
                                                        @endphp
                                                        @foreach ($pemasangan_baru as $pmb)
                                                            <tr>
                                                                <td>{{ $n }}.</td>
                                                                <td class="font-weight-bold">{{ $pmb->nomor_registrasi }}</td>
                                                                <td>{{ $pmb->tanggal->format('d. M Y') }}</td>
                                                                <td>{{ Str::title($pmb->jenis_pemasangan) }}</td>
                                                                <td>{{ $pmb->daya }}</td>
                                                                <td>{{ $pmb->lokasi_pemasangan }}</td>
                                                                <td>
                                                                    @if ($pmb->status_permohonan == 1)
                                                                        <span class="badge badge-danger">Menunggu Konfirmasi</span>
                                                                    @elseif($pmb->status_permohonan == 2)
                                                                    <span class="badge badge-info">Di Konfirmasi</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <a href="#" class="btn btn-warning btn-sm font-weight-bold text-white"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @php
                                                            $n++;
                                                        @endphp
                                                        @endforeach
                                                   </tbody>
                                                </table>
                                            </div>
                                        </div>
                                   </div>
                                </div>

                                <div class="tab-pane fade" id="tdl" role="tabpanel" aria-labelledby="tdl-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="tdl_t" class="display min-w850 text-center" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nomor Registrasi</th>
                                                            <th>Tanggal Permohonan</th>
                                                            <th>Tarif Lama</th>
                                                            <th>Tarif Baru</th>
                                                            <th>Daya Lama</th>
                                                            <th>Daya Baru</th>
                                                            <th>Lokasi Pemasangan</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                        @php
                                                            $n=1;
                                                        @endphp
                                                        @foreach ($tambah_daya as $td)
                                                            <tr>
                                                                <td>{{ $n }}.</td>
                                                                <td class="font-weight-bold">{{ $td->nomor_registrasi }}</td>
                                                                <td>{{ $td->tanggal->format('d. M Y') }}</td>
                                                                <td>{{ $td->tarif_lama }}</td>
                                                                <td>{{ $td->tarif_baru }}</td>
                                                                <td>{{ $td->daya_lama }}</td>
                                                                <td>{{ $td->daya_baru }}</td>
                                                                <td>{{ $td->lokasi_meter }}</td>
                                                                <td>
                                                                    @if ($td->status_permohonan == 1)
                                                                        <span class="badge badge-danger">Menunggu Konfirmasi</span>
                                                                    @elseif($td->status_permohonan == 2)
                                                                    <span class="badge badge-info">Di Konfirmasi</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <a href="#" class="btn btn-warning btn-sm font-weight-bold text-white"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @php
                                                            $n++;
                                                        @endphp
                                                        @endforeach
                                                   </tbody>
                                                </table>
                                            </div>
                                        </div>
                                   </div>
                                </div>

                                <div class="tab-pane fade" id="ib" role="tabpanel" aria-labelledby="ib-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="ib_t" class="display min-w850 text-center" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nomor Registrasi</th>
                                                            <th>Tanggal</th>
                                                            <th>Alamat</th>
                                                            <th>Jenis Instalasi</th>
                                                            <th>Harga Per Titik</th>
                                                            <th>Jumlah Titik</th>
                                                            <th>Total</th>
                                                            <th>Status</th>
                                                            <td>Aksi</td>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                    @php
                                                        $n=1;
                                                    @endphp
                                                  @foreach ($instalasi_bangunan as $ib)
                                                    <tr>
                                                        <td>{{ $n }}</td>
                                                        <td class="font-weight-bold">{{ $ib->nomor_registrasi }}</td>
                                                        <td>{{ $ib->tanggal->format('d, M Y') }}</td>
                                                        <td>{{ $ib->alamat }}</td>
                                                        <td class="font-weight-bold">{{ Str::title($ib->jenis_instalasi) }}</td>
                                                        <td>Rp. {{ number_format($ib->penetapan_harga_per_titik, 0) }}</td>
                                                        <td>
                                                            @if ($ib->jumlah_titik == null)
                                                                <p>-</p>
                                                            @else
                                                                <p>{{ $ib->jumlah_titik }} Titik</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($ib->jumlah_titik == null)
                                                                <p>Rp. -</p>
                                                            @else
                                                                @php
                                                                    $ht = $ib->penetapan_harga_per_titik;
                                                                    $jt = $ib->jumlah_titik;
                                                                    $tot = $ht * $jt;
                                                                @endphp
                                                                <p>Rp. {{ number_format($tot, 0) }}</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($ib->status_permohonan == 1)

                                                                <span class="badge badge-danger">Menungu Konfirmasi</span>

                                                            @endif
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                  @php
                                                      $n++;
                                                  @endphp
                                                  @endforeach
                                                   </tbody>
                                                </table>
                                            </div>
                                        </div>
                                   </div>
                                </div>

                                <div class="tab-pane fade" id="service" role="tabpanel" aria-labelledby="service-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="service_t" class="display min-w850">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Jenis Service</th>
                                                            <th>Nomor Registrasi</th>
                                                            <th>Tanggal</th>
                                                            <th>Alamat</th>
                                                            <th>Jenis Kerusakan</th>
                                                            <th>Deskripsi Kerusakan</th>
                                                            <th>Status Permohonan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $n=1;
                                                        @endphp
                                                        @foreach ($service as $sm)

                                                            <tr>
                                                                <td>{{ $n }}</td>
                                                                <td>
                                                                    @if ($sm->jenis_service == 'meter_listrik')
                                                                        <span class="badge badge-primary">Meter Listrik</span>
                                                                    @elseif($sm->jenis_service == 'listrik_bangunan')
                                                                        <span class="badge badge-primary">Listrik Bangunan</span>
                                                                    @else
                                                                        <small class="text-danger">Not Found.</small>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $sm->nomor_registrasi }}</td>
                                                                <td>{{ $sm->tanggal->format('d, M Y') }}</td>
                                                                <td>{{ $sm->alamat }}</td>
                                                                <td>
                                                                    @foreach ($sm->JenisKerusakan as $js)
                                                                        {{ $js->kerusakan }}
                                                                    @endforeach
                                                                </td>
                                                                <td>
                                                                    @foreach ($sm->JenisKerusakan as $js)
                                                                        {{ $js->deskripsi }}
                                                                    @endforeach
                                                                </td>
                                                                <td>
                                                                    @if ($sm->status_permohonan == 1)
                                                                        <span class="badge badge-danger">Menunggu Konfirmasi</span>
                                                                    @else

                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-warning btn-sm rounded"><i class="fa fa-pencil"></i></button>
                                                                        &nbsp;
                                                                        <button class="btn btn-danger btn-sm rounded"><i class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        @php
                                                            $n++;
                                                        @endphp
                                                        @endforeach
                                                    </tbody>
                                            </div>
                                        </div>
                                   </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

@push('after-script')

<script>
    $(document).ready(function () {
        $('#pmb_t').DataTable();
    });

    $(document).ready(function () {
        $('#tdl_t').DataTable();
    });

    $(document).ready(function () {
        $('#ib_t').DataTable();
    });

    $(document).ready(function () {
        $('#service_t').DataTable();
    });
    $(document).ready(function () {
        $('#s_b').DataTable();
    });
</script>

@endpush
