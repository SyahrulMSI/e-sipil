@extends('layouts.customer')

@section('title', $title)

@section('content')


       <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white font-weight-bold">Transaksi | Down Payment</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="row d-flex justify-content-center mb-3">
                                <div class="col-lg-6">
                                    <img src="{{ asset('img/payment.jpg') }}" class="img-fluid rounded" alt="" style="width:80%">
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="dp" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
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
                                            <td>{{ $n }}.</td>
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
                                            <td>
                                                <div class="btn-group">
                                                    @if ($dp->status == 'SUCCESS')
                                                        <a href="{{ route('invoice.show', $dp->midtrans_booking_code) }}" target="_blank" class="btn btn-primary btn-sm rounded shadow"><i class="fa fa-print"></i>  Cetak</a>
                                                    @else
                                                        <a href="{{ $dp->url_midtrans }}" class="btn btn-success btn-sm"> <i class="fa fa-dollar"></i> Bayar</a>
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
