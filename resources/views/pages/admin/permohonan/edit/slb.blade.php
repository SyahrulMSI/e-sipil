@extends('layouts.app')

@section('title', $title)

@push('after-style')

@endpush

@section('content')

<div class="col-xl-12">



    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="text-white">Layanan Service Listrik Bangunan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.slb.update', $slb->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap:</label>
                                    <input type="text" name="nama_lengkap" class="form-control shadow {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }}" value="{{ $slb->User->nama_lengkap }}">
                                    @error('nama_lengkap')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kerusakan">Kerusakan:</label>
                                    <input type="text" name="kerusakan" id="kerusakan" class="form-control shadow {{ $errors->has('kerusakan') ? 'is-invalid' : '' }}" value="{{ $slb->JenisKerusakan()->first()->kerusakan }}">
                                    @error('kerusakan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alm">Alamat:</label>
                                    <textarea name="alamat" id="alm" class="form-control shadow {{ $errors->has('alamat') ? 'is-invalid' : ''}}" cols="30" rows="10">{{ $slb->alamat }}</textarea>
                                    @error('alamat')
                                        <small class="text-danger">{{ $messsage }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="desc">Deskripsi:</label>
                                    <textarea name="deskripsi" id="desc" class="form-control shadow {{ $errors->has('deskripsi') ? 'is-invalid' : ''}}" cols="30" rows="10">{{ $slb->JenisKerusakan()->first()->deskripsi }}</textarea>
                                    @error('deskripsi')
                                        <small class="text-danger">{{ $messsage }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-sm" type="submit">Simpan</button>
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
