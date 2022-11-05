@extends('layouts.customer')

@section('title', $title)

@push('after-style')

@endpush

@section('content')


        <div class="col-xl-12">



            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white">Layanan Instalasi Bangunan Baru</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="#" method="POST" enctype="multipart/form-data">

                                @csrf
                                @method('POST')

                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap:</label>
                                            <input type="text" name="nama_lengkap" class="form-control" value="" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">

                                    </div>

                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success btn-sm" type="submit">Buat Permohonan</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

@push('before-script')

@endpush
