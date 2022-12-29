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
                                                <table class="table table-striped" style="width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td>Pelayanan</td>
                                                            <td>Tambah Daya</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor Registrasi</td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            @elseif($t->id_pemasangan_baru != null)
                                                <table class="table table-striped" style="width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td>Pelayanan</td>
                                                            <td>Pasang Meter Baru</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            @elseif($t->id_instalasi != null)
                                                <input type="hidden" name="id_instalasi" value="{{ $t->id_instalasi }}" readonly>
                                                <table class="table table-striped" style="width:100%">
                                                    <tbody>
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
                                                <table class="table table-striped" style="width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td>Pelayanan</td>
                                                            <td>Service</td>
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
