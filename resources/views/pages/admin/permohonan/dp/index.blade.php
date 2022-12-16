@extends('layouts.app')

@section('title', $title)

@section('content')


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="btn-group mb-3">
                            <a href="#" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="table-responsive">
                                    <table id="dp" class="table table-striped text-center" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Nomor Registrasi</th>
                                                <th>Nama Pelayanan</th>
                                                <th>Jumlah DP</th>
                                                <th>Status Pembayaran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $n=1;
                                            @endphp
                                            @foreach ($down_payment as $dp)
                                                <tr>
                                                    <td>{{ $n }},</td>
                                                    <td>{{ $dp->User->nama_lengkap }}</td>
                                                    <td>
                                                        @if ($dp->id_tambah_daya != null)
                                                            <span class="font-weight-bold">  {{ $dp->TambahDaya->nomor_registrasi }}</span>
                                                        @elseif($dp->id_pemasangan_baru != null)
                                                            <span class="font-weight-bold">  {{ $dp->PemasanganBaru->nomor_registrasi }}</span>
                                                        @elseif($dp->id_instalasi != null)
                                                            <span class="font-weight-bold">  {{ $dp->InstalasiBangunan->nomor_registrasi }}</span>
                                                        @elseif($dp->id_service != null)
                                                          <span class="font-weight-bold">  {{ $dp->Service->nomor_registrasi }}</span>
                                                        @else
                                                            <span class="font-weight-bold badge badge-info">-</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($dp->id_tambah_daya != null)
                                                            <span class="font-weight-bold badge badge-info">Tambah Daya</span>
                                                        @elseif($dp->id_pemasangan_baru != null)
                                                            <span class="font-weight-bold badge badge-info">Pasang Meter Baru</span>
                                                        @elseif($dp->id_instalasi != null)
                                                            <span class="font-weight-bold badge badge-info">Instalasi Bangunan Baru</span>
                                                        @elseif($dp->id_service != null)
                                                            @if ($dp->Service->jenis_service == 'meter_listrik')
                                                                <span class="font-weight-bold badge badge-info">Service Meter Listrik</span>
                                                            @elseif ($dp->Service->jenis_service == 'listrik_bangunan')
                                                                <span class="font-weight-bold badge badge-info">Service Listrik Bangunan</span>
                                                            @endif
                                                        @else
                                                            <span class="font-weight-bold badge badge-info">-</span>
                                                        @endif
                                                    </td>
                                                    <td>Rp. {{ number_format($dp->total_bayar, 0) }}</td>
                                                    <td>
                                                        <span class="badge badge-primary">{{ $dp->status }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @if ($dp->satatu == 'SUCCESS')
                                                                <a href="#" class="btn btn-info btn-sm"> <i class="fa fa-print"></i>  Invoice</a>
                                                            @else
                                                                <button class="btn btn-info btn-sm" disabled> <i class="fa fa-print"></i>  Invoice</button>
                                                            @endif
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
