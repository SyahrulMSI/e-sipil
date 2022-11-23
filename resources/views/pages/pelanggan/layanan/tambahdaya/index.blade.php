@extends('layouts.customer')

@section('title', $title)

@push('after-style')

@endpush

@section('content')

<div class="col-xl-12">



    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="text-white">Layanan Tambah Daya Listrik</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('customer.tambah_daya_listrik.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('POST')

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap:</label>
                                    <input type="text" name="nama_lengkap" class="form-control shadow {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }}" value="{{ Auth::user()->nama_lengkap }}">
                                    @error('nama_lengkap')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lama">Tarif Lama:</label>
                                                    <input type="number" name="tarif_lama" class="form-control shadow {{ $errors->has('tarif_lama') ? 'is-invalid' : ''}}" value="{{ old('tarif_lama') }}">
                                                    @error('tarif_lama')
                                                        $message
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lama">Tarif Baru:</label>
                                                    <input type="number" name="tarif_baru" class="form-control shadow {{ $errors->has('tarif_baru') ? 'is-invalid' : ''}}" value="{{ old('tarif_baru') }}">
                                                    @error('tarif_baru')
                                                        $message
                                                    @enderror
                                                </div><script src=""></script>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="daya_lama">Daya Lama:</label>
                                                    <select name="daya_lama" id="daya_lama" class="form-control shadow {{ $errors->has('daya_lama') ? 'is-invalid' : '' }}">
                                                        <option selected disabled>-- Pilih Daya --</option>
                                                        <option value="250">250</option>
                                                        <option value="450">450</option>
                                                        <option value="900">900</option>
                                                    </select>
                                                    @error('daya_lama')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="daya_baru">Daya Baru:</label>
                                                    <select name="daya_baru" id="daya_baru" class="form-control shadow {{ $errors->has('daya_baru') ? 'is-invalid' : '' }}">
                                                        <option selected disabled>-- Pilih Daya --</option>
                                                        <option value="250">250</option>
                                                        <option value="450">450</option>
                                                        <option value="900">900</option>
                                                    </select>
                                                    @error('daya_baru')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="lokasi">Lokasi Pemasangan:</label>
                                    <textarea name="lokasi_meter" id="lokasi" cols="30" rows="10" class="form-control shadow {{ $errors->has('lokasi_meter') ? 'is-invalid' : '' }}">{{ old('lokasi_meter') }}</textarea>
                                    @error('lokasi_meter')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

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
