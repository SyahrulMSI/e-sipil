@extends('layouts.customer')

@section('title', $title)

@section('content')


       <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white font-weight-bold">Transaksi Pelunasan</h5>
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
                                <table id="pelunasan" class="table table-striped text-center" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
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
                                                        @if($t->status == "SUCCESS" || $t->status == "Success" || $t->status == 'success')
                                                            <a href="#" class="btn btn-primary btn-sm rounded shadow">Invoice</a>
                                                        @else
                                                            &nbsp;
                                                            <a href="{{ $t->url_midtrans }}" class="btn btn-success btn-sm rounded shadow" target="_blank">Bayar</a>
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
            $('#pelunasan').DataTable();
        });
       </script>
@endpush
