@extends('layouts.customer')

@section('title', $title)

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <img src="{{ asset('img/agenda.jpg') }}" class="img-fluid rounded " alt="" style="width:80%">
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 col-xxl-6 col-lg-6">
    <div class="card">
        <div class="card-header border-0 pb-0">
            <h4 class="card-title">Pasang Meter Baru</h4>
        </div>
        <div class="card-body">
            <div id="DZ_W_TimeLine11" class="widget-timeline dz-scroll style-1 height370">
                <ul class="timeline">
                    @forelse ($pmb as $item)
                    <li>
                        <div class="timeline-badge info">
                        </div>
                        <a class="timeline-panel text-muted" href="#">
                            <span>{{ Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</span>
                            <h6 class="mb-0">{{ Str::title($item->jenis_pemasangan) }} <strong class="text-info">#X{{ $item->nomor_registrasi }}.</strong></h6>
                            <p class="mb-0">
                               
                            </p>
                            @if(empty($item->Tugas()->first()->status))
                            @else
                                @if($item->Tugas()->first()->status == 0)
                                    <span class="badge badge-danger badge-sm">Menunggu Konfirmasi</span>
                                @elseif($item->Tugas()->first()->status == 1)
                                    <span class="badge badge-info badge-sm">Di Konfirmasi</span>
                                @elseif($item->Tugas()->first()->status == 2)
                                    <span class="badge badge-primary badge-sm">Survei & Prepare</span>
                                @elseif($item->Tugas()->first()->status == 3)
                                    <span class="badge badge-success badge-sm">Proses</span>
                                @elseif($item->Tugas()->first()->status == 4)
                                    <span class="badge badge-warning badge-sm">Testing</span>
                                @elseif($item->Tugas()->first()->status == 5)
                                    <span class="badge badge-primary badge-sm">Finishing</span>
                                @elseif($item->Tugas()->first()->status == 6)
                                    <span class="badge badge-success badge-sm">Selesai</span>
                                @endif
                            @endif
                        </a>
                    </li>
                    @empty
                        <div class="alert alert-warning text-center" role="alert">
                            <h5 class="font-weight-bold">Maaf, Belum ada agenda untuk saat ini.</h5>
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="col-xl-6 col-xxl-6 col-lg-6">
    <div class="card">
        <div class="card-header border-0 pb-0">
            <h4 class="card-title">Servis Meter Listrik</h4>
        </div>
        <div class="card-body">
            <div id="DZ_W_TimeLine11" class="widget-timeline dz-scroll style-1 height370">
                <ul class="timeline">
                    @forelse($sm as $item)
                        <li>
                            <div class="timeline-badge primary"></div>
                            <a class="timeline-panel text-muted" href="#">
                                <span>{{  Carbon\Carbon::parse($item->tanggal)->format('d F Y')  }}</span>
                                <h6 class="mb-0">Service Meter Listrik <strong class="text-primary">#X{{ $item->nomor_registrasi }}.</strong></h6>
                                <p class="mb-0">
                                    @if(empty($item->Tugas()->first()->status))
                                    @else
                                        @if($item->Tugas()->first()->status == 0)
                                            <span class="badge badge-danger badge-sm">Menunggu Konfirmasi</span>
                                        @elseif($item->Tugas()->first()->status == 1)
                                            <span class="badge badge-info badge-sm">Di Konfirmasi</span>
                                        @elseif($item->Tugas()->first()->status == 2)
                                            <span class="badge badge-primary badge-sm">Survei & Prepare</span>
                                        @elseif($item->Tugas()->first()->status == 3)
                                            <span class="badge badge-success badge-sm">Proses</span>
                                        @elseif($item->Tugas()->first()->status == 4)
                                            <span class="badge badge-warning badge-sm">Testing</span>
                                        @elseif($item->Tugas()->first()->status == 5)
                                            <span class="badge badge-primary badge-sm">Finishing</span>
                                        @elseif($item->Tugas()->first()->status == 6)
                                            <span class="badge badge-success badge-sm">Selesai</span>
                                        @endif
                                    @endif
                                </p>
                            </a>
                        </li>
                    @empty
                        <div class="alert alert-warning text-center" role="alert">
                            <h5 class="font-weight-bold">Maaf, Belum ada agenda untuk saat ini.</h5>
                        </div>
                   @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="col-xl-6 col-xxl-6 col-lg-6">
    <div class="card">
        <div class="card-header border-0 pb-0">
            <h4 class="card-title">Instalasi Bangunan Baru</h4>
        </div>
        <div class="card-body">
            <div id="DZ_W_TimeLine11" class="widget-timeline dz-scroll style-1 height370">
                <ul class="timeline">
                    @forelse ($sm as $item)
                        <li>
                            <div class="timeline-badge primary"></div>
                            <a class="timeline-panel text-muted" href="#">
                                <span>{{  Carbon\Carbon::parse($item->tanggal)->format('d F Y')  }}</span>
                                <h6 class="mb-0">Service Meter Listrik <strong class="text-primary">#X{{ $item->nomor_registrasi }}.</strong></h6>
                                <p class="mb-0">
                                    @if(empty($item->Tugas()->first()->status))
                                    @else
                                        @if($item->Tugas()->first()->status == 0)
                                            <span class="badge badge-danger badge-sm">Menunggu Konfirmasi</span>
                                        @elseif($item->Tugas()->first()->status == 1)
                                            <span class="badge badge-info badge-sm">Di Konfirmasi</span>
                                        @elseif($item->Tugas()->first()->status == 2)
                                            <span class="badge badge-primary badge-sm">Survei & Prepare</span>
                                        @elseif($item->Tugas()->first()->status == 3)
                                            <span class="badge badge-success badge-sm">Proses</span>
                                        @elseif($item->Tugas()->first()->status == 4)
                                            <span class="badge badge-warning badge-sm">Testing</span>
                                        @elseif($item->Tugas()->first()->status == 5)
                                            <span class="badge badge-primary badge-sm">Finishing</span>
                                        @elseif($item->Tugas()->first()->status == 6)
                                            <span class="badge badge-success badge-sm">Selesai</span>
                                        @endif
                                    @endif
                                </p>
                            </a>
                        </li>
                    @empty
                        <div class="alert alert-warning text-center" role="alert">
                            <h5 class="font-weight-bold">Maaf, Belum ada agenda untuk saat ini.</h5>
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="col-xl-6 col-xxl-6 col-lg-6">
    <div class="card">
        <div class="card-header border-0 pb-0">
            <h4 class="card-title">Servis Instalasi</h4>
        </div>
        <div class="card-body">
            <div id="DZ_W_TimeLine11" class="widget-timeline dz-scroll style-1 height370">
                <ul class="timeline">
                    @forelse ($ib as $item)
                        <li>
                            <div class="timeline-badge success">
                            </div>
                            <a class="timeline-panel text-muted" href="#">
                                <span>{{  Carbon\Carbon::parse($item->tanggal)->format('d F Y')  }}</span>
                                <h6 class="mb-0">{{ Str::title($item->jenis_instalasi )}} <strong class="text-success">#X{{ $item->nomor_registrasi }}.</strong></h6>
                                <p class="mb-0">
                                    @if(empty($item->Tugas()->first()->status))
                                    @else
                                        @if($item->Tugas()->first()->status == 0)
                                            <span class="badge badge-danger badge-sm">Menunggu Konfirmasi</span>
                                        @elseif($item->Tugas()->first()->status == 1)
                                            <span class="badge badge-info badge-sm">Di Konfirmasi</span>
                                        @elseif($item->Tugas()->first()->status == 2)
                                            <span class="badge badge-primary badge-sm">Survei & Prepare</span>
                                        @elseif($item->Tugas()->first()->status == 3)
                                            <span class="badge badge-success badge-sm">Proses</span>
                                        @elseif($item->Tugas()->first()->status == 4)
                                            <span class="badge badge-warning badge-sm">Testing</span>
                                        @elseif($item->Tugas()->first()->status == 5)
                                            <span class="badge badge-primary badge-sm">Finishing</span>
                                        @elseif($item->Tugas()->first()->status == 6)
                                            <span class="badge badge-success badge-sm">Selesai</span>
                                        @endif
                                    @endif
                                </p>
                            </a>
                        </li>
                    @empty
                        <div class="alert alert-warning text-center" role="alert">
                            <h5 class="font-weight-bold">Maaf, Belum ada agenda untuk saat ini.</h5>
                        </div>
                   @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
