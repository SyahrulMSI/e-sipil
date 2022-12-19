@extends('layouts.petugas')

@section('title', $title)

@section('content')

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white fomt-weight-bold">Daftar Tugas</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Customer</th>
                                    <th>Jenis Layanan</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n=1;
                                @endphp
                                @foreach($tugas as $t)
                                <tr>
                                    <td>{{ $n }}.</td>
                                    <td>{{$t->Pelanggan->nama_lengkap}}</td>
                                    <td>
                                        @if ($t->id_tambah_daya != null)
                                            <span class="font-weight-bold badge badge-info">Tambah Daya</span>
                                        @elseif($t->id_pemasangan_baru != null)
                                            <span class="font-weight-bold badge badge-info">Pasang Meter Baru</span>
                                        @elseif($t->id_instalasi != null)
                                            <span class="font-weight-bold badge badge-info">Instalasi Bangunan Baru</span>
                                        @elseif($t->id_service != null)
                                            @if ($t->Service->jenis_service == 'meter_listrik')
                                                <span class="font-weight-bold badge badge-info">Service Meter Listrik</span>
                                            @elseif ($t->Service->jenis_service == 'listrik_bangunan')
                                                <span class="font-weight-bold badge badge-info">Service Listrik Bangunan</span>
                                            @endif
                                        @else
                                            <span class="font-weight-bold badge badge-info">-</span>
                                        @endif
                                    </td>
                                    <td>Lorem ipsum dolor sit amet</td>
                                    <td>
                                            {{--  Menuggu Konfirmasi  =>  0,
                                            Di Konfirmasi =>    1,
                                            Survei & Prepare => 2,
                                            Proses => 3,
                                            Testing => 4,
                                            Finishing => 5  --}}
                                        @if($t->status == 0)
                                            <span class="badge badge-danger badge-sm">Menunggu Konfirmasi</span>
                                        @elseif($t->status == 1)
                                            <span class="badge badge-info badge-sm">Di Konfirmasi</span>
                                        @elseif($t->status == 2)
                                            <span class="badge badge-primary badge-sm">Survei & Prepare</span>
                                        @elseif($t->status == 3)
                                            <span class="badge badge-success badge-sm">Proses</span>
                                            @elseif($t->status == 4)
                                            <span class="badge badge-warning badge-sm">Testing</span>
                                            @elseif($t->status == 5)
                                            <span class="badge badge-primary badge-sm">Finishing</span>
                                            @elseif($t->status == 6)
                                            <span class="badge badge-success badge-sm">Selesai/span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('petugas.list_tugas.show', $t->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#status{{ $t->id }}"><i class="fa fa-edit"></i> Ubah Status</button>

                                        <div class="modal fade" id="status{{ $t->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                  <h5 class="modal-title font-weight-bold text-white" id="staticBackdropLabel">Update Status</h5>
                                                  <button type="button" class="close font-weight-bold text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <form action="{{ route('petugas.list_tugas.update', $t->id) }}" entype="multipar/form-data" method="POST">
                                                                @csrf
                                                                @method('PUT')
            
                                                                <div class="form-group">
                                                                    <labe class="text-left">Pilih Status:</label>
                                                                    <select name="status" class="form-control shadow">
                                                                        <option selected disabled>-- Pilih Status --</option>
                                                                        <option value="1" {{ $t->status == 1  ? 'selected' : ''}}>Di Konfirmasi</option>
                                                                        <option value="2" {{ $t->status == 2  ? 'selected' : ''}}>Survei & Prepare</option>
                                                                        <option value="3" {{ $t->status == 3  ? 'selected' : ''}}>Proses</option>
                                                                        <option value="4" {{ $t->status == 4  ? 'selected' : ''}}>Testing</option>
                                                                        <option value="5" {{ $t->status == 5  ? 'selected' : ''}}>Finishing</option>
                                                                        <option value="6" {{ $t->status == 6  ? 'selected' : ''}}>Selesai</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <button class="btn btn-success btn-sm" type="submit">Simpan</button>
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

@endsection
