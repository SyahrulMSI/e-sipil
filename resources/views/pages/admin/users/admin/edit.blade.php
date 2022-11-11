@extends('layouts.app')

@section('title', $title)

@section('content')

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white fomt-weight-bold">Edit Administrator</h5>
                </div>
                <div class="card-body">
                    <div class="btn-group mb-3">
                        <a href="{{ route('admin.administrator.index') }}" class="btn btn-warning font-weight-bold btn-sm"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('admin.administrator.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap:</label>
                                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }} shadow" value="{{ $user == null ? old('nama_lengkap') : $user->nama_lengkap }}">
                                            @error('nama_lengkap')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="em">Email:</label>
                                            <input type="email" name="email" id="em" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} shadow" value="{{ $user == null ? old('email') : $user->email }}">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="no">No Telephon: <small class="text-danger">*Optional</small></label>
                                            <input type="number" type="no_telp" class="form-control {{ $errors->has('no_telp') ? 'is-invalid' : '' }} shadow" value="{{ $user == null ? old('no_telp') : $user->no_telp }}">
                                            @error('no_telp')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="psw">Password: <small class="text-danger">*Kosongi jika tidak diedit.</small></label>
                                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''  }} shadow">
                                            @error('password')
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
