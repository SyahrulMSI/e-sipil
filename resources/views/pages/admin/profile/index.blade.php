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
                        <form action="{{ route('admin.my_profile.update', Auth::user()->id ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap:</label>
                                        <input type="text" name="nama_lengkap" class="form-control shadow {{ $errors->has('nama_lengkap' ? 'is-invalid' : '') }}" value="{{ Auth::user()->nama_lengkap }}">
                                        @error('nama_lengkap')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" class="form-control shadow {{ $errors->has('email') ? 'is-invalid' : ''}}" value="{{ Auth::user()->email }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="no_hp">No Handphone:</label>
                                        <input type="number" name="no_telp" class="form-control shadow {{ $errors->has('no_telp') ? 'is-invalid' : '' }} " value="{{ Auth::user()->no_telp }}">
                                        @error('no_telp')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="psw">Password:</label>
                                        <input type="password" name="password" class="form-control shadow {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


      </div>

      <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">

                        @if (Auth::user()->DetailUser()->exists())
                        <form action="{{ route('admin.detail_profile.update', Auth::user()->DetailUser()->first()->id) }}" id="update_du" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        @else
                        <form action="{{ route('admin.detail_profile.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                        @endif

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="profile">Profile:</label>
                                    @if (Auth::user()->DetailUser != null)
                                        <br>
                                        <img src="{{ Auth::user()->DetailUser()->exists() ? Auth::user()->DetailUser->first()->profile : '' }}" class="img-fluid rounded mb-3" alt="" width="50%">
                                    @endif
                                    <input type="file" name="profile" class="form-control {{ $errors->has('profile') ? 'is-invalid' : '' }} shadow">
                                    @error('profile')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="npwp">Npwp:</label>
                                    <input type="text" name="npwp" class="form-control {{ $errors->has('npwp') ? 'is-invalid' : '' }} shadow" value="{{ Auth::user()->DetailUser()->exists() ? Auth::user()->DetailUser->first()->npwp : '' }}">
                                    @error('npwp')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin:</label>
                                    <select name="jenis_kelamin" id="jk" class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }} shadow ">
                                        <option selected disabled>-- Pilih Jenis kelamin --</option>
                                        <option value="L" {{ Auth::user()->DetailUser()->exists() ? (Auth::user()->DetailUser()->first()->jenis_kelamin == 'L' ? 'selected' : '') : '' }}>Laki - Laki</option>
                                        <option value="P" {{ Auth::user()->DetailUser()->exists() ? (Auth::user()->DetailUser()->first()->jenis_kelamin == 'P' ? 'selected' : '') : '' }}>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kel">Kelurahan:</label>
                                    <input type="text" name="kelurahan" class="form-control {{ $errors->has('kelurahan') ? 'is-invalid' : '' }} shadow" value="{{ Auth::user()->DetailUser()->exists() ? Auth::user()->DetailUser->first()->kelurahan : ''  }}">
                                    @error('kelurahan')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kec">Kecamatan:</label>
                                    <input type="text" name="kecamatan" class="form-control {{ $errors->has('kecamatan') ? 'is-invalid' : '' }} shadow" value="{{ Auth::user()->DetailUser()->exists() ? Auth::user()->DetailUser->first()->kecamatan : ''  }}">
                                    @error('kecamatan')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="kab">Kabupaten:</label>
                                    <input type="text" name="kabupaten" class="form-control {{ $errors->has('kabupaten') ? 'is-invalid' : '' }} shadow" value="{{ Auth::user()->DetailUser()->exists() ? Auth::user()->DetailUser->first()->kabupaten : ''  }}">
                                    @error('kabupaten')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="prov">Provinsi:</label>
                                    <input type="text" name="provinsi" class="form-control {{ $errors->has('provinsi') ? 'is-invalid' : '' }} shadow" value="{{ Auth::user()->DetailUser()->exists() ? Auth::user()->DetailUser->first()->provinsi : ''  }}">
                                    @error('provinsi')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="ji">Jenis Identitas:</label>
                                    <select name="jenis_identitas" id="ji" class="form-control {{ $errors->has('jenis_identitas') ? 'is-invalid' : ''}} shadow">
                                        <option selected disabled>-- Pilih Jenis Identitas --</option>
                                        <option value="ktp" {{ Auth::user()->DetailUser()->exists() ? (Auth::user()->DetailUser()->first()->jenis_identitas == 'ktp' ? 'selected' : '') : '' }}>KTP</option>
                                        <option value="kis" {{ Auth::user()->DetailUser()->exists() ? (Auth::user()->DetailUser()->first()->jenis_identitas == 'kis' ? 'selected' : '') : '' }}>KIS</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="noi">No Identitas:</label>
                                    <input type="text" name="no_identitas" class="form-control {{ $errors->has('no_identitas') ? 'is-invalid' : '' }} shadow" value="{{ Auth::user()->DetailUser()->exists() ? Auth::user()->DetailUser->first()->no_identitas : ''  }}">
                                    @error('no_identitas')
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


@push('after-script')

@endpush


