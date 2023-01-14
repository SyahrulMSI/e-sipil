@extends('layouts.app')

@section('title', $title)

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <form action="{{ route('admin.laporan.create') }}" method="GET" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group mb-3">
                                                        <label for="">Tanggal Awal:</label>
                                                        <input type="date" name="tgl_awal" class="form-control shadow" value="{{ old('tgl_awal') }}">
                                                    @error('tgl_awal')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">

                                                    <label for="">Tanggal Akhir:</label>
                                                    <input type="date" name="tgl_akhir" class="form-control shadow" value="{{ old('tgl_akhir') }}">
                                                    @error('tgl_akhir')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <button type="submit" class="btn btn-success btn-sm shadow rounded">Cetak</button>
                                                </div>
                                                </div>
                                            </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-script')

@endpush


