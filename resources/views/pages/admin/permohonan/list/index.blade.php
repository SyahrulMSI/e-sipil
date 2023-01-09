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
                                    <a class="nav-link" id="lb-tab" data-toggle="tab" href="#lb" role="tab" aria-controls="lb"
                                      aria-selected="false">Servis Listrik Bangunan</a>
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
                                                                    @elseif($pb->status_permohonan == 2)
                                                                        <span class="badge badge-success">Terkonfirmasi</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.pasang.meter', $pb->id) }}" class="btn btn-warning btn-sm rounded"><i class="fa fa-pencil"></i></a>
                                                                        &nbsp;
                                                                        <button class="btn btn-danger btn-sm rounded" type="button" data-toggle="modal" data-target="#deletepmb{{ $pb->id }}"><i class="fa fa-trash"></i></button>

                                                                        <div class="modal fade" id="deletepmb{{ $pb->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                <div class="modal-header bg-danger font-weight-bold text-white">
                                                                                  <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                  </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                  <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="alert alert-warning" role="alert">
                                                                                            <h6>Apakah anda yakin ingin meghapus data ini ?</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                                                    <form action="{{ route('admin.pmb.delete', $pb->id) }}" method="POST" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit" class="btn btn-primary btn-sm">Hapus</button>
                                                                                    </form>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                          </div>

                                                                    </div>
                                                                    <div class="form-group mt-2">
                                                                        @if ($pb->Transaksi()->exists())
                                                                        <a href="{{ route('admin.list_permohonan.add_petugas_pmb.index', $pb->id) }}" class="btn btn-primary btn-sm rounded font-weight-bold"><i class="fa fa-plus-circle"></i> Tambah Petugas</a>
                                                                        @else
                                                                        <a href="{{ route('admin.list_permohonan.k_pasang_meter.index', $pb->id) }}" class="btn btn-success btn-sm rounded">Konfirmasi</a>
                                                                        @endif
                                                                        &nbsp;
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
                                                            <th>ID Meter</th></th>
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
                                                                <td>{{ $td->ID_meter }}</td>
                                                                <td>{{ $td->tanggal->format('d, M Y') }}</td>
                                                                <td>{{ $td->tarif_lama }}</td>
                                                                <td>{{ $td->tarif_baru }}</td>
                                                                <td>{{ $td->daya_lama }}</td>
                                                                <td>{{ $td->daya_baru }}</td>
                                                                <td>{{ $td->lokasi_meter }}</td>
                                                                <td>
                                                                    @if ($td->status_permohonan == 1)
                                                                        <span class="badge badge-danger">Menunggu Konfirmasi</span>
                                                                    @elseif($td->status_permohonan == 2)
                                                                        <span class="badge badge-success">Terkonfirmasi</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.tambah.daya', $td->id) }}" class="btn btn-warning btn-sm rounded"><i class="fa fa-pencil"></i></a>
                                                                        &nbsp;
                                                                        <button class="btn btn-danger btn-sm rounded" type="button" data-toggle="modal" data-target="#deletetd{{ $td->id }}"><i class="fa fa-trash"></i></button>

                                                                        <div class="modal fade" id="deletetd{{ $td->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                <div class="modal-header bg-danger font-weight-bold text-white">
                                                                                  <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                  </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                  <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="alert alert-warning" role="alert">
                                                                                            <h6>Apakah anda yakin ingin meghapus data ini ?</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                                                    <form action="{{ route('admin.td.delete', $td->id) }}" method="POST" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit" class="btn btn-primary btn-sm">Hapus</button>
                                                                                    </form>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                          </div>
                                                                    </div>
                                                                    <div class="form-group mt-2">
                                                                        @if ($td->Transaksi()->exists())
                                                                        <a href="{{ route('admin.list_permohonan.add_petugas_td.index', $td->id) }}" class="btn btn-primary btn-sm rounded font-weight-bold"><i class="fa fa-plus-circle"></i> Tambah Petugas</a>
                                                                        @else
                                                                        <a href="{{ route('admin.list_permohonan.k_tambah_daya.index', $td->id) }}" class="btn btn-success btn-sm rounded">Konfirmasi</a>
                                                                        @endif
                                                                        &nbsp;
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
                                                                <td>
                                                                    @if($ib->jumlah_titik != null || $ib->jumlah_titik != "")
                                                                    {{ $ib->jumlah_titik }} Titik
                                                                    @else
                                                                    -
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        $h = $ib->penetapan_harga_per_titik;
                                                                        $j = $ib->jumlah_titik;
                                                                        $tot = $h * $j;
                                                                    @endphp
                                                                    Rp. {{ number_format($tot, 0) }}
                                                                </td>
                                                                <td>
                                                                    @if ($ib->status_permohonan == 1)
                                                                        <span class="badge badge-danger">Menunggu Konfirmasi</span>
                                                                    @elseif($ib->status_permohonan == 2)
                                                                        <span class="badge badge-success">Terkonfirmasi</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.instalasi.bangunan', $ib->id) }}" class="btn btn-warning btn-sm rounded"><i class="fa fa-pencil"></i></a>
                                                                        &nbsp;


                                                                        <button class="btn btn-danger btn-sm rounded" type="button" data-toggle="modal" data-target="#deleteib{{ $ib->id }}"><i class="fa fa-trash"></i></button>

                                                                        <div class="modal fade" id="deleteib{{ $ib->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                <div class="modal-header bg-danger font-weight-bold text-white">
                                                                                  <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                  </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                  <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="alert alert-warning" role="alert">
                                                                                            <h6>Apakah anda yakin ingin meghapus data ini ?</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                                                    <form action="{{ route('admin.ib.delete', $td->id) }}" method="POST" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit" class="btn btn-primary btn-sm">Hapus</button>
                                                                                    </form>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                          </div>

                                                                    </div>
                                                                    {{--  @if ($ib->jumlah_titik != null || $ib->jumlah_titik != "")  --}}
                                                                        <div class="form-group mt-2">
                                                                            @if ($ib->Transaksi()->exists())
                                                                            <a href="{{ route('admin.list_permohonan.add_petugas_ib.index', $ib->id) }}" class="btn btn-primary btn-sm rounded font-weight-bold"><i class="fa fa-plus-circle"></i> Tambah Petugas</a>
                                                                            @else
                                                                            <a href="{{ route('admin.list_permohonan.k_instalasi_bangunan.index', $ib->id) }}" class="btn btn-success btn-sm rounded">Konfirmasi</a>
                                                                            @endif
                                                                            &nbsp;
                                                                        </div>
                                                                    {{--  @endif  --}}
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
                                            <h4 class="card-title">Servis Meter Listrik</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="sml_tbl" class="display min-w850">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Pelanggan</th>
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
                                                        @foreach ($service_meter as $sm)

                                                            <tr>
                                                                <td>{{ $n }}</td>
                                                                <td>{{ $sm->User->nama_lengkap }}</td>
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
                                                                    @elseif($pb->status_permohonan == 2)
                                                                        <span class="badge badge-success">Terkonfirmasi</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.sml', $sm->id) }}" class="btn btn-warning btn-sm rounded"><i class="fa fa-pencil"></i></a>
                                                                        &nbsp;
                                                                        <button class="btn btn-danger btn-sm rounded" type="button" data-toggle="modal" data-target="#deletesml{{ $sm->id }}"><i class="fa fa-trash"></i></button>

                                                                        <div class="modal fade" id="deletesml{{ $sm->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                <div class="modal-header bg-danger font-weight-bold text-white">
                                                                                  <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                  </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                  <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="alert alert-warning" role="alert">
                                                                                            <h6>Apakah anda yakin ingin meghapus data ini ?</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                                                    <form action="{{ route('admin.sml.delete', $sm->id) }}" method="POST" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit" class="btn btn-primary btn-sm">Hapus</button>
                                                                                    </form>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                          </div>
                                                                    </div>
                                                                    <div class="form-group mt-2">
                                                                        @if ($sm->Transaksi()->exists())
                                                                        <a href="{{ route('admin.list_permohonan.add_petugas_service.index', $sm->id) }}" class="btn btn-primary btn-sm rounded font-weight-bold"><i class="fa fa-plus-circle"></i> Tambah Petugas</a>
                                                                        @else
                                                                        <a href="{{ route('admin.list_permohonan.k_service_meter_listrik.index', $sm->id) }}" class="btn btn-success btn-sm rounded">Konfirmasi</a>
                                                                        @endif
                                                                        &nbsp;
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


                                <div class="tab-pane fade" id="lb" role="tabpanel" aria-labelledby="lb-tab">

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Service Listrik Bangunan</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="lb_tbl" class="display min-w850">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Pelanggan</th>
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
                                                        @foreach ($listrik_bangunan as $lb)

                                                            <tr>
                                                                <td>{{ $n }}</td>
                                                                <td>{{ $lb->User->nama_lengkap }}</td>
                                                                <td>{{ $lb->nomor_registrasi }}</td>
                                                                <td>{{ $lb->tanggal->format('d, M Y') }}</td>
                                                                <td>{{ $lb->alamat }}</td>
                                                                <td>
                                                                    @foreach ($lb->JenisKerusakan as $js)
                                                                        {{ $js->kerusakan }}
                                                                    @endforeach
                                                                </td>
                                                                <td>
                                                                    @foreach ($lb->JenisKerusakan as $js)
                                                                        {{ $js->deskripsi }}
                                                                    @endforeach
                                                                </td>
                                                                <td>
                                                                    @if ($lb->status_permohonan == 1)
                                                                        <span class="badge badge-danger">Menunggu Konfirmasi</span>
                                                                    @elseif($pb->status_permohonan == 2)
                                                                        <span class="badge badge-success">Terkonfirmasi</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.sml', $lb->id) }}" class="btn btn-warning btn-sm rounded"><i class="fa fa-pencil"></i></a>
                                                                        &nbsp;


                                                                        <button class="btn btn-danger btn-sm rounded" type="button" data-toggle="modal" data-target="#deleteslb{{ $lb->id }}"><i class="fa fa-trash"></i></button>

                                                                        <div class="modal fade" id="deleteslb{{ $lb->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                <div class="modal-header bg-danger font-weight-bold text-white">
                                                                                  <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                  </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                  <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="alert alert-warning" role="alert">
                                                                                            <h6>Apakah anda yakin ingin meghapus data ini ?</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                                                    <form action="{{ route('admin.slb.delete', $lb->id) }}" method="POST" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit" class="btn btn-primary btn-sm">Hapus</button>
                                                                                    </form>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                          </div>

                                                                    </div>
                                                                    <div class="form-group mt-2">
                                                                        @if ($lb->Transaksi()->exists())
                                                                        <a href="{{ route('admin.list_permohonan.add_petugas_service.index', $lb->id) }}" class="btn btn-primary btn-sm rounded font-weight-bold"><i class="fa fa-plus-circle"></i> Tambah Petugas</a>
                                                                        @else
                                                                        <a href="{{ route('admin.list_permohonan.k_service_listrik_bangunan.index', $lb->id) }}" class="btn btn-success btn-sm rounded">Konfirmasi</a>
                                                                        @endif
                                                                        &nbsp;
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

                $(document).ready(function () {
                    $('#lb_tbl').DataTable();
                });
            </script>
@endpush
