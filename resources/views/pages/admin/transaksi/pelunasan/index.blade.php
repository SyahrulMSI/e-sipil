@extends('layouts.app')

@section('title', $title)

@section('content')


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        {{--  <div class="btn-group mb-3">
                            <a href="{{ route('admin.pelunasan.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
                        </div>  --}}

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="table-responsive">
                                    <table id="transaksi" class="table table-striped text-center" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Kode Transaksi</th>
                                                <th>Nama Pelayanan</th>
                                                <th>Total Bayar</th>
                                                <th>Status Pembayaran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $n=1;
                                            @endphp
                                            @foreach ($transaksi as $t)
                                                <tr>
                                                    <td>{{ $n }}.</td>
                                                    <td>{{ $t->User->nama_lengkap }}</td>
                                                    <td>{{ $t->midtrans_booking_code }}</td>
                                                    <td>
                                                        @if ($t->id_tambah_daya != null)
                                                            <span class="badge badge-info badge-sm">Tambah Daya</span>
                                                        @elseif($t->id_pemasangan_baru != null)
                                                            <span class="badge badge-info badge-sm">Pemasangan Baru</span>
                                                        @elseif($t->id_instalasi != null)
                                                            <span class="badge badge-info badge-sm">Instalasi Bangunan Baru</span>
                                                        @elseif($t->id_service != null)
                                                            @if ($t->Service->jenis_service == 'meter_listrik')
                                                                <span class="badge badge-info badge-sm">Service Meter Listrik</span>
                                                            @elseif ($t->Service->jenis_service == 'listrik_bangunan')
                                                                <span class="badge badge-info badge-sm">Service Listrik Bangunan</span>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>Rp. {{ number_format($t->total_bayar, 0) }}</td>
                                                    <td>
                                                        <span class="badge badge-primary badge-sm">{{ Str::title($t->status) }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-danger btn-sm rounded shadow" type="button" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
                                                            &nbsp;
                                                            @if($t->status == "SUCCESS" || $t->status == "Success" || $t->status == 'success')
                                                                <a href="#" class="btn btn-primary btn-sm rounded shadow">Invoice</a>
                                                            @endif

                                                            <div class="modal fade" id="delete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                      </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="alert alert-warning" role="alert">
                                                                                    <p class="font-weight-bold">Apakah anda yakin akan menghapus data ini ?</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <form action="{{ route('admin.pelunasan.destroy', $t->id) }}"  method="POST" enctype="multipart/form-data" id="delete_act">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                        </form>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                                      <button type="button" class="btn btn-primary btn-sm" onclick="event.preventDefault(); document.getElementById('delete_act').submit();">Hapus</button>
                                                                    </div>
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
                </div>


            </div>

@endsection

@push('after-script')
    <script>
        $(document).ready(function () {
            $('#transaksi').DataTable();
        });
    </script>
@endpush
