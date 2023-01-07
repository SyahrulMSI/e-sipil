@extends('layouts.app')

@section('title', $title)

@section('content')

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
                                <span>{{ $item->User->nama_lengkap }}</span>
                                <h6 class="mb-0">{{ Str::title($item->jenis_pemasangan) }} <strong class="text-info">#X{{ $item->nomor_registrasi }}.</strong></h6>
                                <p class="mb-0">{{ Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</p>
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
                   @forelse ($sm as $item)
                    <li>
                        <div class="timeline-badge primary"></div>
                        <a class="timeline-panel text-muted" href="#">
                            <span>{{ $item->User->nama_lengkap }}</span>
                            <h6 class="mb-0">Service Meter Listrik <strong class="text-primary">#X{{ $item->nomor_registrasi }}.</strong></h6>
                            <p class="mb-0">{{  Carbon\Carbon::parse($item->tanggal)->format('d F Y')  }}</p>
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
                    @forelse ($ib as $item)
                        <li>
                            <div class="timeline-badge success">
                            </div>
                            <a class="timeline-panel text-muted" href="#">
                                <span>{{  $item->User->nama_lengkap  }}</span>
                                <h6 class="mb-0">{{ Str::title($item->jenis_instalasi )}} <strong class="text-success">#X{{ $item->nomor_registrasi }}.</strong></h6>
                                <p class="mb-0">{{  Carbon\Carbon::parse($item->tanggal)->format('d F Y')  }}</p>
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
                    @forelse ($slb as $item)
                        <li>
                            <div class="timeline-badge warning">
                            </div>
                            <a class="timeline-panel text-muted" href="#">
                                <span>{{  $item->User->nama_lengkap  }}</span>
                                <h6 class="mb-0">Service Listrik Bangunan <strong class="text-warning">#X{{ $item->nomor_registrasi }}.</strong></h6>
                                <p class="mb-0">{{  Carbon\Carbon::parse($item->tanggal)->format('d F Y')  }}</p>
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
