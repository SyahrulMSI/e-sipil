@extends('layouts.customer')

@section('title', $title)

@push('after-style')

@endpush

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive overflow-auto">
                        <table id="progress" class="table table-striped text-center" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Petugas</th>
                                    <th>Jenis Layanan</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n=1;
                                @endphp
                                @foreach($tugas as $t)
                                <tr>
                                    <td>{{ $n }}.</td>
                                    <td>{{ $t->Petugas->nama_lengkap }}</td>
                                    <td>
                                        @if ($t->id_tambah_daya != null)
                                            <span class="font-weight-bold badge badge-info badge-sm">Tambah Daya</span>
                                        @elseif($t->id_pemasangan_baru != null)
                                            <span class="font-weight-bold badge badge-info badge-sm">Pasang Meter Baru</span>
                                        @elseif($t->id_instalasi != null)
                                            <span class="font-weight-bold badge badge-info badge-sm">Instalasi Bangunan Baru</span>
                                        @elseif($t->id_service != null)
                                            @if ($t->Service->jenis_service == 'meter_listrik')
                                                <span class="font-weight-bold badge badge-info badge-sm">Service Meter Listrik</span>
                                            @elseif ($t->Service->jenis_service == 'listrik_bangunan')
                                                <span class="font-weight-bold badge badge-info badge-sm">Service Listrik Bangunan</span>
                                            @endif
                                        @else
                                            <span class="font-weight-bold badge badge-info">-</span>
                                        @endif
                                    </td>
                                    <td>Lorem ipsum dolor sit amet</td>
                                    <td>
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
                                            <span class="badge badge-success badge-sm">Selesai</span>
                                        @endif
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
            $('#dprogress').DataTable();
        });
       </script>
@endpush
