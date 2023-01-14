@extends('layouts.app')

@section('title', $title)

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive overflow-auto">
                            <table id="dp" class="table table-striped" style="width:100%">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Customer</th>
                                        <th>Layanan</th>
                                        <th>Total Bayar</th>
                                        <th>Kode Transaksi</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @php
                                        $n=1;
                                    @endphp
                                    @foreach ($dpt as $dp)
                                        <tr>
                                            <td>{{ $n }}.</td>
                                            <td>{{ $dp->User->nama_lengkap }}</td>
                                            <td>
                                                @if ($dp->id_tambah_daya != null)
                                                    <span class="badge badge-info badge-sm">Tambah Daya</span>
                                                @elseif($dp->id_pemasangan_baru != null)
                                                    <span class="badge badge-info badge-sm">Pemasangan Baru</span>
                                                @elseif($dp->id_instalasi != null)
                                                    <span class="badge badge-info badge-sm">Instalasi Bangunan Baru</span>
                                                @elseif($dp->id_service != null)
                                                    @if ($dp->Service->jenis_service == 'meter_listrik')
                                                        <span class="badge badge-info badge-sm">Service Meter Listrik</span>
                                                    @elseif ($dp->Service->jenis_service == 'listrik_bangunan')
                                                        <span class="badge badge-info badge-sm">Service Listrik Bangunan</span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>Rp. {{ number_format($dp->total_bayar, 0) }}</td>
                                            <td>{{ $dp->midtrans_booking_code }}</td>
                                            <td>
                                                        @if($dp->status == 'SUCCESS')
                                                            <span class="badge badge-primary badge-sm">BERHASIL</span>
                                                        @elseif($dp->status == 'WAITING')
                                                            <span class="badge badge-primary badge-sm">MENUNGGU</span>
                                                        @elseif($dp->status == 'FAILED')
                                                                <span class="badge badge-primary badge-sm">GAGAL</span>
                                                        @elseif($dp->status == 'PENDING')
                                                            <span class="badge badge-primary badge-sm">DITUNDA</span>
                                                        @endif
                                            </td>
                                            <td>{{ Carbon\Carbon::parse($dp->tanggal_transaksi)->format('d F Y') }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-danger btn-sm rounded" type="button" data-toggle="modal" data-target="#delete{{ $dp->id }}"><i class="fa fa-trash"></i></button>
                                                    @if($dp->status == 'SUCCESS')
                                                    &nbsp;
                                                    <a href="{{ route('invoice.show', $dp->midtrans_booking_code) }}" target="_blank" class="btn btn-primary btn-sm rounded shadow"><i class="fa fa-print"></i>  Cetak</a>
                                                    @endif
                                                </div>

                                                <div class="modal fade" id="delete{{ $dp->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                          <h5 class="modal-title font-weight-bold text-white" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                                          <button type="button" class="close font-weight-bold text-white" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="alert alert-warning">
                                                                    <h6 class="font-weight-bold">Apakah anda yakin akan menghapus data ini ?</h6>
                                                                </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                            <form action="{{ route('admin.uang_muka.destroy', $dp->id) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                <button type="submit" class="btn btn-primary btn-sm">Hapus</button>
                                                            </form>
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
            $('#dp').DataTable();
        });
    </script>
@endpush


