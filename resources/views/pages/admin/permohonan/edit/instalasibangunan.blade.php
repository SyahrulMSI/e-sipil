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
                            <form action="{{ route('admin.instalasi.bangunan.update', $ib->id) }}" method="POST" enctype="multipart/form-data">

                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap:</label>
                                            <input type="text" name="nama_lengkap" class="form-control shadow {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }}" value="{{ $ib->User->nama_lengkap }}">
                                            @error('nama_lengkap')
                                                <small class="text-danger">{{ $mesaage }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="jenis">Jenis Instalasi:</label>
                                            <select name="jenis_instalasi" id="jenis" class="form-control shadow {{ $errors->has('jenis_instalasi') ? 'is-invalid' : '' }}">
                                                <option selected disabled>-- Pilih Jenis Instalasi --</option>
                                                <option value="rumah" {{ $ib->jenis_instalasi == 'rumah' ? 'selected' : '' }}>Rumah</option>
                                                <option value="panel control" {{ $ib->jenis_instalasi == 'panel_control' ? 'selected' : '' }}>Panel Control</option>
                                            </select>
                                            @error('jenis_instalasi')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="hp">Harga Pertitik:</label>
                                            <input type="number" name="penetapan_harga_per_titik" class="form-control shadow" value="40000">
                                       </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="alamat">Alamat:</label>
                                            <textarea name="alamat" class="form-control shadow {{ $errors->has('alamat') ? 'is-invalid' : '' }}" id="alamat" cols="30" rows="10">{{ $ib->alamat }}</textarea>
                                            @error('alamat')
                                                <small class="text-danger">{{ $message }}</small>
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
