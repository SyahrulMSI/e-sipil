@extends('layouts.app')

@section('title', $title)

@push('after-style')

@endpush

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.list_permohonan.k_pasang_meter.store', $pb->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="nl">Nama Lengkap:</label>
                                    <input type="text" name="nama_lengkap" class="form-control shadow" readonly value="{{ $u->nama_lengkap }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nl">Email:</label>
                                    <input type="text" name="email" class="form-control shadow" readonly value="{{ $u->email }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nl">No Telp / Whatsapp:</label>
                                    <input type="text" name="no_telp" class="form-control shadow" readonly value="{{ $u->no_telp }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nl">No NPWP:</label>
                                    <input type="text" name="npwp" class="form-control shadow" readonly value="{{ $u->DetailUser()->exists() ? $u->DetailUSer->first()->npwp : ''}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jk">jenis Kelamin:</label>
                                    <input type="text" name="jenis_kelamin" class="form-control shadow" readonly value="{{ $u->DetailUser()->exists() ? ($u->DetailUser()->first()->jenis_kelamin == 'L' ? 'Laki Laki' : 'Perempuan') : '' }}">
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="nl">Kelurahan:</label>
                                                    <input type="text" name="kelurahan" class="form-control shadow" readonly value="{{ $u->DetailUser()->exists() ? $u->DetailUSer->first()->kelurahan : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="nl">Kelurahan:</label>
                                                    <input type="text" name="kecamatan" class="form-control shadow" readonly value="{{ $u->DetailUser()->exists() ? $u->DetailUSer->first()->kecamatan : ''}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="nl">Kabupaten:</label>
                                                    <input type="text" name="kabupaten" class="form-control shadow" readonly value="{{ $u->DetailUser()->exists() ? $u->DetailUSer->first()->kabupaten : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="nl">Provinsi:</label>
                                                    <input type="text" name="provinsi" class="form-control shadow" readonly value="{{ $u->DetailUser()->exists() ? $u->DetailUSer->first()->provinsi : ''}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="nl">Jenis Identitas:</label>
                                                    <input type="text" name="ji" class="form-control shadow" readonly value="{{ $u->DetailUser()->exists() ? Str::title($u->DetailUSer->first()->jenis_identitas) : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="nl">No Identitas:</label>
                                                    <input type="text" name="no_i" class="form-control shadow" readonly value="{{ $u->DetailUser()->exists() ? $u->DetailUSer->first()->no_identitas : ''}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="nl">Nomor Registrasi:</label>
                                    <input type="text" name="nr" class="form-control shadow" readonly value="{{ $pb->nomor_registrasi }}">
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="nl">Jenis Pemasangan:</label>
                                                    <input type="text" name="jp" class="form-control shadow" readonly value="{{ Str::title($pb->jenis_pemasangan)}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="nl">Daya:</label>
                                                    <input type="text" name="daya" class="form-control shadow" readonly value="{{ $pb->daya }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="tb">Alamat:</label>
                                    <textarea name="alamat" id="" class="form-control shadow" cols="30" rows="5">{{ $pb->lokasi_pemasangan }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="tb">Total Bayar:</label>
                                    <input type="number" name="total_bayar" class="form-control shadow {{ $errors->has('total_bayar') ? 'is-invalid' : '' }}" value="{{ old('total_bayar') }}">
                                    @error('total_bayar')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tp">Jenis Pembayaran:</label>
                                    <select name="type_pembayaran" class="form-control shadow {{ $errors->has('type_pembayaran') ? 'is-invalid' : '' }}" id="tp">
                                        <option selected disabled>-- Pilih Type Pembayaran --</option>
                                        <option value="dp">Down Payment (DP)</option>
                                        <option value="pelunasan">Pelunasan</option>
                                    </select>
                                    @error('type_pembayaran')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-script')

@endpush
