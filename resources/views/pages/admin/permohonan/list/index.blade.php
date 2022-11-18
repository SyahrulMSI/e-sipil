@extends('layouts.app')

@section('title', $title)

@section('content')

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                       <div class="row">
                        <div class="col-lg-12">

                            <ul class="nav nav-tabs nav-justified mb-3 text-dark" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="pmb-tab" data-toggle="tab" href="#pmb" role="tab" aria-controls="pmb"
                                    aria-selected="true">Pasang Meter Baru</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="sml-tab" data-toggle="tab" href="#td" role="tab" aria-controls="td"
                                      aria-selected="false">Tambah Daya</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="ibb-tab" data-toggle="tab" href="#ibb" role="tab" aria-controls="ibb"
                                      aria-selected="false">Instalasi Bangunan Baru</a>
                                  </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="sml-tab" data-toggle="tab" href="#sml" role="tab" aria-controls="sml"
                                    aria-selected="false">Servis Meter Listrik</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="si-tab" data-toggle="tab" href="#si" role="tab" aria-controls="si"
                                      aria-selected="false">Servis Instalasi</a>
                                  </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="pmb" role="tabpanel" aria-labelledby="pmb-tab">

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Pasang Meter Baru</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example" class="display min-w850">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No</th>
                                                            <th>Nama Pelanggan</th>
                                                            <th>Nomor Registrasi</th>
                                                            <th>Tanggal</th>
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
                                                        @foreach ($pasang_baru as $pb)
                                                            <tr class="text-center">
                                                                <td>{{ $n }}.</td>
                                                                <td>{{ $pb->User->nama_lengkap }}</td>
                                                                <td class="font-weight-bold">{{ $pb->nomor_registrasi }}</td>
                                                                <td>{{ $pb->tanggal->format('d, M Y') }}</td>
                                                                <td>{{ $pb->jenis_pemasangan }}</td>
                                                                <td>{{ $pb->daya }}</td>
                                                                <td>{{ $pb->lokasi_pemasangan }}</td>
                                                                <td>
                                                                    @if ($pb->status_permohonan == 1)
                                                                        <span class="badge badge-danger">Menuggu Konfirmasi</span>
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
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="td" role="tabpanel" aria-labelledby="sml-tab">


                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Tambah Daya</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="si" class="display min-w850 table-striped" width="100%">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No</th>
                                                            <th>Nama Pelanggan</th>
                                                            <th>Nomor Registrasi</th>
                                                            <th>Tanggal</th>
                                                            <th>Tarif Lama</th>
                                                            <th>tarif Baru</th>
                                                            <th>Daya Lama</th>
                                                            <th>Daya Baru</th>
                                                            <th>Lokasi Meter</th>
                                                            <th>Status Permohonan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $n=1;
                                                        @endphp
                                                        @foreach ($tambah_daya as $td)

                                                            <tr class="text-center">
                                                                <td>{{ $n }}.</td>
                                                                <td>{{ $td->User->nama_lengkap }}</td>
                                                                <td class="font-weight-bold">{{ $td->nomor_registrasi }}</td>
                                                                <td>{{ $td->tanggal->format('d, M Y') }}</td>
                                                                <td>{{ $td->tarif_lama }}</td>
                                                                <td>{{ $td->tarif_baru }}</td>
                                                                <td>{{ $td->daya_lama }}</td>
                                                                <td>{{ $td->daya_baru }}</td>
                                                                <td>{{ $td->lokasi_meter }}</td>
                                                                <td>
                                                                    @if ($td->status_permohonan == 1)
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

                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="tab-pane fade" id="ibb" role="tabpanel" aria-labelledby="ibb-tab">

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Instalasi Banguan Baru</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="ibb_tbl" class="display min-w850 table-striped" width="100%">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No</th>
                                                            <th>Nama Pelanggan</th>
                                                            <th>Nomor Registrasi</th>
                                                            <th>Tanggal</th>
                                                            <th>Alamat Lokasi</th>
                                                            <th>Jenis Instalasi</th>
                                                            <th>Harga Pertitik</th>
                                                            <th>Jumlah Titik</th>
                                                            <th>Total Harga</th>
                                                            <th>Status Permohonan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @php
                                                            $n=1;
                                                        @endphp
                                                        @foreach ($instalasi_bangunan as $ib)
                                                            <tr class="text-center">
                                                                <td>{{ $n }}</td>
                                                                <td>{{ $ib->User->nama_lengkap }}</td>
                                                                <td class="font-weight-bold">{{ $ib->nomor_registrasi }}</td>
                                                                <td>{{ $ib->tanggal->format('d, M Y') }}</td>
                                                                <td>{{ $ib->alamat }}</td>
                                                                <td>{{ $ib->jenis_instalasi }}</td>
                                                                <td>{{ $ib->penetapan_harga_per_titik }}</td>
                                                                <td>{{ $ib->jumlah_titik }} Titik</td>
                                                                <td>
                                                                    @php
                                                                        $h = $ib->penetapan_harga_per_titik;
                                                                        $j = $ib->jumlah_titik;
                                                                        $tot = $h * $j;
                                                                    @endphp
                                                                    Rp. {{ number_format($tot, 0) }}
                                                                </td>
                                                                <td>
                                                                    @if ($ib->status_permohonan = 1)
                                                                        <span class="badge badge-danger">Menunggu Konfirmasi</span>
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

                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                </div>


                                <div class="tab-pane fade" id="sml" role="tabpanel" aria-labelledby="sml-tab">


                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Servis Instalasi</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="sml_tbl" class="display min-w850">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Position</th>
                                                            <th>Office</th>
                                                            <th>Age</th>
                                                            <th>Start date</th>
                                                            <th>Salary</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Tiger Nixon</td>
                                                            <td>System Architect</td>
                                                            <td>Edinburgh</td>
                                                            <td>61</td>
                                                            <td>2011/04/25</td>
                                                            <td>$320,800</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Garrett Winters</td>
                                                            <td>Accountant</td>
                                                            <td>Tokyo</td>
                                                            <td>63</td>
                                                            <td>2011/07/25</td>
                                                            <td>$170,750</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ashton Cox</td>
                                                            <td>Junior Technical Author</td>
                                                            <td>San Francisco</td>
                                                            <td>66</td>
                                                            <td>2009/01/12</td>
                                                            <td>$86,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cedric Kelly</td>
                                                            <td>Senior Javascript Developer</td>
                                                            <td>Edinburgh</td>
                                                            <td>22</td>
                                                            <td>2012/03/29</td>
                                                            <td>$433,060</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Airi Satou</td>
                                                            <td>Accountant</td>
                                                            <td>Tokyo</td>
                                                            <td>33</td>
                                                            <td>2008/11/28</td>
                                                            <td>$162,700</td>
                                                        </tr>

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Position</th>
                                                            <th>Office</th>
                                                            <th>Age</th>
                                                            <th>Start date</th>
                                                            <th>Salary</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>




                                <div class="tab-pane fade" id="si" role="tabpanel" aria-labelledby="si-tab">

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Pasang Meter Baru</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="si_tbl" class="display min-w850">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Position</th>
                                                            <th>Office</th>
                                                            <th>Age</th>
                                                            <th>Start date</th>
                                                            <th>Salary</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Tiger Nixon</td>
                                                            <td>System Architect</td>
                                                            <td>Edinburgh</td>
                                                            <td>61</td>
                                                            <td>2011/04/25</td>
                                                            <td>$320,800</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Garrett Winters</td>
                                                            <td>Accountant</td>
                                                            <td>Tokyo</td>
                                                            <td>63</td>
                                                            <td>2011/07/25</td>
                                                            <td>$170,750</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ashton Cox</td>
                                                            <td>Junior Technical Author</td>
                                                            <td>San Francisco</td>
                                                            <td>66</td>
                                                            <td>2009/01/12</td>
                                                            <td>$86,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cedric Kelly</td>
                                                            <td>Senior Javascript Developer</td>
                                                            <td>Edinburgh</td>
                                                            <td>22</td>
                                                            <td>2012/03/29</td>
                                                            <td>$433,060</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Airi Satou</td>
                                                            <td>Accountant</td>
                                                            <td>Tokyo</td>
                                                            <td>33</td>
                                                            <td>2008/11/28</td>
                                                            <td>$162,700</td>
                                                        </tr>

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Position</th>
                                                            <th>Office</th>
                                                            <th>Age</th>
                                                            <th>Start date</th>
                                                            <th>Salary</th>
                                                        </tr>
                                                    </tfoot>
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
                var table = $('#si').DataTable({

                });

            </script>

            <script>
                $(document).ready(function () {
                    $('#ibb_tbl').DataTable();
                });

                $(document).ready(function () {
                    $('#sml_tbl').DataTable();
                });
            </script>
@endpush
