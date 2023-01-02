@extends('layouts.app')

@section('title', $title)

@section('content')
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('admin.pelunasan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="table-responsive">
                                            <input type="hidden" name="us" value="{{$t->id_pelanggan}}" readonly>
                                            @if($t->id_tambah_daya != null)
                                                <input type="hidden" name="id_tambah_daya" value="{{ $t->id_tambah_daya }}" readonly>
                                                <table class="table table-striped" style="width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td>Pelanggan</td>
                                                            <td>{{ $t->TambahDaya->User()->first()->nama_lengkap }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pelayanan</td>
                                                            <td>Tambah Daya</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor Registrasi</td>
                                                            <td>{{ $t->TambahDaya->nomor_registrasi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Permohonan</td>
                                                            <td>{{ Carbon\Carbon::parse($t->TambahDaya->tanggal)->format('d F Y') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tarif Lama</td>
                                                            <td>{{ $t->TambahDaya->tarif_lama }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tarif Baru</td>
                                                            <td>{{ $t->TambahDaya->tarif_baru }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Daya Lama</td>
                                                            <td>{{ $t->TambahDaya->daya_lama }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Daya Baru</td>
                                                            <td>{{ $t->TambahDaya->daya_baru }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat</td>
                                                            <td>{{ $t->TambahDaya->lokasi_meter }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jumlah DP</td>
                                                            <td>Rp. {{ $t->TambahDaya->Transaksi()->exists() ? number_format($t->TambahDaya->Transaksi()->where('type_pembayaran', 'dp')->first()->total_bayar, 0) : '' }}</td>
                                                            <input type="hidden" name="dp" id="dp" value="{{ $t->TambahDaya->Transaksi()->where('type_pembayaran', 'dp')->first()->total_bayar  }}" readonly>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            @elseif($t->id_pemasangan_baru != null)
                                            <input type="hidden" name="id_pemasangan_baru" value="{{ $t->id_pemasangan_baru }}" readonly>
                                                <table class="table table-striped" style="width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td>Pelanggan</td>
                                                            <td>{{ $t->PemasanganBaru->User()->first()->nama_lengkap }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pelayanan</td>
                                                            <td>Pasang Meter Baru</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor Registrasi</td>
                                                            <td>{{ $t->PemasanganBaru->nomor_registrasi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Permoonan</td>
                                                            <td>{{ Carbon\Carbon::parse($t->PemasanganBaru->tanggal)->format('d F Y') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenis Pemasangan</td>
                                                            <td>{{ Str::title($t->PemasanganBaru->jenis_pemasangan) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Daya</td>
                                                            <td>{{ $t->PemasanganBaru->daya }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat</td>
                                                            <td>{{ $t->PemasanganBaru->lokasi_pemasangan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jumlah DP</td>
                                                            <td>Rp. {{ $t->PemasanganBaru->Transaksi()->exists() ? number_format($t->PemasanganBaru->Transaksi()->where('type_pembayaran','dp')->first()->total_bayar, 0) : '' }}</td>
                                                            <input type="hidden" name="dp" id="dp" value="{{ $t->PemasanganBaru->Transaksi()->where('type_pembayaran','dp')->first()->total_bayar  }}" readonly>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            @elseif($t->id_instalasi != null)
                                                <input type="hidden" name="id_instalasi" value="{{ $t->id_instalasi }}" readonly>
                                                <table class="table table-striped" style="width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td>Pelanggan</td>
                                                            <td>{{ $t->Instalasi->User()->first()->nama_lengkap }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pelayanan</td>
                                                            <td>Instalasi Bangunan Baru</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor Registrasi</td>
                                                            <td>{{ $t->Instalasi->nomor_registrasi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenis Instalasi</td>
                                                            <td>{{ Str::title($t->Instalasi->jenis_instalasi) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Harga Per Titik</td>
                                                            <td>Rp. {{ number_format($t->Instalasi->penetapan_harga_per_titik, 0)  }}</td>
                                                            <input type="hidden" id="h_titik" value="{{ $t->Instalasi->penetapan_harga_per_titik }}" readonly>
                                                        </tr>
                                                        <tr>
                                                            <td>Jumlah Titik</td>
                                                            <td><span class="badge badge-primary font-weight-bold">{{ $t->Instalasi->jumlah_titik }}</span></td>
                                                            <input type="hidden" id="j_titik" value="{{ $t->Instalasi->jumlah_titik  }}" readonly>
                                                        </tr>
                                                        <tr>
                                                            <tr>
                                                                <td>Alat & Bahan</td>
                                                                <td>Rp. <input type="number" name="ab" id="ab"> <button onclick="sum()" type="button">Jumlah</button></td>
                                                            </tr>
                                                        </tr>
                                                        <tr>
                                                            @php
                                                                $jml = $t->Instalasi->penetapan_harga_per_titik * $t->Instalasi->jumlah_titik;
                                                            @endphp
                                                            <td>Total</td>
                                                            <td><span class="badge badge-warning" id="total"></span></td>
                                                            <input type="hidden" id="nominal" name="nominal">
                                                        </tr>
                                                        <tr>
                                                            <td>Jumlah Dp</td>
                                                            <td><span class="badge badge-success">Rp. {{ $t->Instalasi->Transaksi()->exists() ? number_format($t->Instalasi->Transaksi()->where('type_pembayaran', 'dp')->first()->total_bayar, 0) : '' }}</span></td>
                                                            <input type="hidden" name="dp" id="jumlah_dp" value="{{ $t->Instalasi->Transaksi()->where('type_pembayaran', 'dp')->first()->total_bayar  }}" readonly>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            @elseif($t->id_service != null)
                                            <input type="hidden" name="id_service" value="{{ $t->id_service }}" readonly>
                                                <table class="table table-striped" style="width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td>Pelanggan</td>
                                                            <td>{{ $t->Service->User()->first()->nama_lengkap }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pelayanan</td>
                                                            <td>Service</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenis Service</td>
                                                            <td>
                                                                @if($t->Service->jenis_service == "meter_listrik")
                                                                    <span class="badge badge-primary badge-sm">Meter Listrik</span>
                                                                @elseif($t->Service->jenis_service == "listrik_bangunan")
                                                                    <span class="badge badge-primary badge-sm">Listrik Bangunan</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor Segistrasi</td>
                                                            <td>{{ $t->Service->nomor_registrasi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Permohonan</td>
                                                            <td>{{ Carbon\Carbon::parse($t->Service->tanggal)->format('d F Y') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat</td>
                                                            <td>{{ $t->Service->alamat }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kerusakan</td>
                                                            <td>
                                                                <table class="table table">
                                                                    <thead class="text-center">
                                                                        <tr>
                                                                            <th>Nama</th>
                                                                            <th>Deskripsi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @forelse ($t->Service->JenisKerusakan as $jk)
                                                                            <tr>
                                                                                <td>{{ $jk->kerusakan }}</td>
                                                                                <td>{{ $jk->deskripsi }}</td>
                                                                            </tr>
                                                                        @empty

                                                                        @endforelse
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total DP</td>
                                                            <td>Rp. {{ number_format($t->Service->Transaksi()->first()->total_bayar, 0) }}</td>
                                                            <input type="hidden" name="dp" id="dp" value="{{ $t->Service->Transaksi()->where('type_pembayaran', 'dp')->first()->total_bayar  }}" readonly>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="">Nominal Tagihan:</label>
                                            <input type="number" name="nominal_tagihan" id="nominal_tagihan" class="form-control shadow font-weight-bold" value="old('nominal_tagihan')">
                                            @error('nominal_tagihan')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Rincian Tagihan</label>
                                            <textarea name="rincian" id="" class="form-control shadow"  id="rincian" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm rounded shadow" type="submit">Buat Tagihan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('after-script')

    @if ($t->id_instalasi != null)

        <script type="text/javascript">
          function sum()
          {
            const harga_per_titik = document.getElementById('h_titik').value;
            const jumlah_titik = document.getElementById('j_titik').value;
            const alat_dan_bahan = document.getElementById('ab').value
            const dp = document.getElementById('jumlah_dp').value
            const sub_total = harga_per_titik * jumlah_titik;
            const grand_total = parseInt(sub_total) + parseInt(alat_dan_bahan);

            const final_total = parseInt(grand_total) - parseInt(dp);

            if(!isNaN(grand_total)){
                document.getElementById('total').innerHTML = grand_total;
                document.getElementById('nominal').value = grand_total;
                document.getElementById('nominal_tagihan').value = final_total;
            }

          }
        </script>

    @endif

    <script>
        CKEDITOR.replace( 'rincian' );
    </script>

@endpush
