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
                                                <table id="tdl_t" class="display min-w850">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>e</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>e</td>
                                                    </tr>
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
                                                <table id="ib_t" class="display min-w850">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>e</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>e</td>
                                                    </tr>
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
                                                            <th>e</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>e</td>
                                                    </tr>
                                                   </tbody>
                                                </table>
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
</script>

@endpush
