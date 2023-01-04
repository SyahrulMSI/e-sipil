@extends('layouts.customer')

@section('title', $title)

@push('after-style')

@endpush

@section('content')

<div class="col-xl-12">



    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="text-white">Layanan Pasang Meter Baru</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <div class="row d-flex justify-content-center mb-3">
                        <div class="col-lg-6">
                            <img src="{{ asset('img/layanan.jpg') }}" class="img-fluid rounded" alt="" style="width:80%">
                        </div>
                    </div>

                    <form action="{{ route('customer.pasang_meter_baru.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('POST')

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap: <small class="text-danger">*Isi dengan nama lengkap !</small></label>
                                    <input type="text" name="nama_lengkap" class="form-control shadow {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }}" value="{{ Auth::user()->nama_lengkap }}">
                                    @error('nama_lengkap')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jenis">Jenis Pemasangan:</label>
                                    <select name="jenis_pemasangan" id="jenis" class="form-control shadow {{ $errors->has('jenis_pemasangan' ? 'in-valid' : '') }}">
                                        <option selected disabled>-- Pilih Jenis Pemasangan --</option>
                                        <option value="rumah" {{ old('jenis_pemasangan')  == 'rumah' ? 'selected' : ''}}>Rumah</option>
                                        <option value="bisnis" {{ old('jenis_pemasangan')  == 'bisnis' ? 'selected' : ''}}>Bisnis</option>
                                        <option value="perusahaan" {{ old('jenis_pemasangan')  == 'perusahaan' ? 'selected' : ''}}>Perusahaan</option>
                                    </select>
                                    @error('jenis_pemasangan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="daya">Daya:</label>
                                    <select name="daya" id="daya" class="form-control shadow {{ $errors->has('daya' ? 'in-valid' : '') }}">
                                        <option selected disabled>-- Pilih Daya --</option>
                                        <option value="250">250</option>
                                        <option value="450">450</option>
                                        <option value="900">900</option>
                                    </select>
                                    @error('daya')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="lokasi">Lokasi Pemasangan:</label>
                                    <textarea name="lokasi_pemasangan" id="lokasi" cols="30" rows="10" class="form-control shadow {{ $errors->has('lokasi' ? 'in-valid' : '') }}" value="{{ old('lokasi') }}"></textarea>
                                </div>
                                @error('lokasi_pemasangan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
    <script>

    </script>
@endpush
