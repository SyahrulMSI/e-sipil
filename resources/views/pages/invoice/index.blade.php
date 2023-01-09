
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <!-- Site Title -->
  <title>{{ $title }}</title>
  <link rel="stylesheet" href="{{ asset('invoice/css/style.css') }}">
</head>

<body>
  <div class="tm_container">
    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style2 tm_type1 tm_accent_border" id="tm_download_section">
        <div class="tm_invoice_in">
          <div class="tm_invoice_head tm_top_head tm_mb20 tm_mb10_md">
            <div class="tm_invoice_left">
              <div class="tm_logo"><img src="{{ asset('logo/logo.png') }}" alt="Logo"></div>
            </div>
            <div class="tm_invoice_right">
            <img src="{{ asset('dashboard/images/logo-text.png') }}" class="img-fluid"alt="">
              <div class="tm_grid_row tm_col_3">

              </div>
            </div>
            <div class="tm_shape_bg tm_accent_bg"></div>
          </div>
          <div class="tm_invoice_info tm_mb10">
            <div class="tm_invoice_info_left">
              <p class="tm_mb2"><b>Invoice To:</b></p>
              <p>
                <b class="tm_f16 tm_primary_color">{{ $inv->User->nama_lengkap }}</b> <br>
                {{ $inv->User->DetailUser()->first()->kelurahan }},  {{ $inv->User->DetailUser()->first()->kecamatan }},
                <br>
                {{ $inv->User->DetailUser()->first()->kabupaten }},  {{ $inv->User->DetailUser()->first()->provinsi }},
                <br>
                {{ $inv->User->email }}<br>
                {{ $inv->user->no_telp }}
              </p>
            </div>
            <div class="tm_invoice_info_right">
            @if($inv->type_pembayaran == 'dp')
                <div class="tm_f40 tm_text_uppercase tm_text_center tm_invoice_title tm_mb15 tm_ternary_color tm_mobile_hide">Invoice Down Payment</div>
            @elseif($inv->type_pembayaran == 'pelunasan')
                <div class="tm_f40 tm_text_uppercase tm_text_center tm_invoice_title tm_mb15 tm_ternary_color tm_mobile_hide">Invoice Pelunasan</div>
            @endif

              <div class="tm_grid_row tm_col_3 tm_invoice_info_in tm_round_border tm_gray_bg">
                <div>
                  <span>Invoice No:</span> <br>
                  <b class="tm_f12 tm_accent_color">{{ $inv->midtrans_booking_code }}</b>
                </div>
                <div>
                  <span>Invoice Date:</span> <br>
                  <b class="tm_f12 tm_accent_color">{{ Carbon\Carbon::parse($inv->tanggal_transaksi)->format('d F Y') }}</b>
                </div>
                <div>
                  <span>Grand Total:</span> <br>
                  <b class="tm_f16 tm_accent_color">Rp. {{ number_format($inv->total_bayar) }}</b>
                </div>
              </div>
            </div>
          </div>
          <div class="tm_table tm_style1">
            <div class="tm_round_border">
              <div class="tm_table_responsive">
                <table>
                  <thead>
                    <tr>
                      <th class="tm_width_7 tm_semi_bold tm_primary_color">Item</th>
                      <th class="tm_width_2 tm_semi_bold tm_primary_color">Price</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color">Qty</th>
                      <th class="tm_width_2 tm_semi_bold tm_primary_color tm_text_right">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($inv->type_pembayaran == 'pelunasan')
                        <tr class="tm_gray_bg">
                            <td class="tm_width_7">
                                @if($inv->id_tambah_daya != null)
                                    <p class="tm_m0 tm_f16 tm_primary_color">Tambah Daya</p>
                                    Tarif {{ $inv->TambahDaya->tarif_lama }} to {{ $inv->TambahDaya->tarif_baru }} <br>
                                    Daya {{ $inv->TambahDaya->daya_lama }} to {{ $inv->TambahDaya->daya_baru }} <br>
                                    ID Meter {{ $inv->TambahDaya->ID_meter }} <br>
                                    {!! $inv->RincianPelunasan()->first()->rincian !!}
                                @elseif($inv->id_pemasangan_baru != null)
                                    <p class="tm_m0 tm_f16 tm_primary_color">Pemasangan Meter Baru {{ Str::title($inv->PemasanganBaru->jenis_pemasangan) }}</p>
                                    Daya {{ $inv->PemasanganBaru->daya }} <br>
                                    {!! $inv->RincianPelunasan()->first()->rincian !!}
                                @elseif($inv->id_instalasi != null)
                                    <p class="tm_m0 tm_f16 tm_primary_color">Instalasi Bangunan {{ Str::title($inv->InstalasiBangunan->jenis_instalasi) }}</p>
                                    {!! $inv->RincianPelunasan()->first()->rincian !!}
                                @elseif($inv->id_service != null)
                                    <p class="tm_m0 tm_f16 tm_primary_color">Service {{ $inv->Service->jenis_service == 'meter_listrik' ? 'Meter Listrik' : 'Listrik Bangunan' }}</p>
                                    {{ $inv->Service->JenisKerusakan()->first()->kerusakan }} <br>
                                    {{ $inv->Service->JenisKerusakan()->first()->deskripsi }}
                                    <hr>
                                    {!! $inv->RincianPelunasan()->first()->rincian !!}
                                @endif
                            </td>
                            <td class="tm_width_2">Rp. {{ number_format($inv->RincianPelunasan()->first()->nominal_tagihan, 0) }}</td>
                            <td class="tm_width_1">1</td>
                            <td class="tm_width_2 tm_text_right">Rp. {{ number_format($inv->RincianPelunasan()->first()->nominal_tagihan, 0) }}</td>
                        </tr>
                    @elseif($inv->type_pembayaran == 'dp')
                        <tr class="tm_gray_bg">
                            <td class="tm_width_7">
                                @if($inv->id_tambah_daya != null)
                                    <p class="tm_m0 tm_f16 tm_primary_color">Tambah Daya</p>
                                    Tarif {{ $inv->TambahDaya->tarif_lama }} to {{ $inv->TambahDaya->tarif_baru }} <br>
                                    Daya {{ $inv->TambahDaya->daya_lama }} to {{ $inv->TambahDaya->daya_baru }} <br>
                                    ID Meter {{ $inv->TambahDaya->ID_meter }}
                                @elseif($inv->id_pemasangan_baru != null)
                                    <p class="tm_m0 tm_f16 tm_primary_color">Pemasangan Meter Baru {{ Str::title($inv->PemasanganBaru->jenis_pemasangan) }}</p>
                                    Daya {{ $inv->PemasanganBaru->daya }} <br>
                                @elseif($inv->id_instalasi != null)
                                    <p class="tm_m0 tm_f16 tm_primary_color">Instalasi Bangunan {{ Str::title($inv->InstalasiBangunan->jenis_instalasi) }}</p>
                                    {{ $inv->InstalasiBangunan->jumlah_titik }} Titik
                                @elseif($inv->id_service != null)
                                    <p class="tm_m0 tm_f16 tm_primary_color">Service {{ $inv->Service->jenis_service == 'meter_listrik' ? 'Meter Listrik' : 'Listrik Bangunan' }}</p>
                                    {{ $inv->Service->JenisKerusakan()->first()->kerusakan }} <br>
                                    {{ $inv->Service->JenisKerusakan()->first()->deskripsi }}
                                @else
                                    ----
                                @endif
                            </td>
                            <td class="tm_width_2">Rp. {{ number_format($inv->total_bayar, 0) }}</td>
                            <td class="tm_width_1">1</td>
                            <td class="tm_width_2 tm_text_right">Rp. {{ number_format($inv->total_bayar, 0) }}</td>
                        </tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tm_invoice_footer tm_mb15 tm_m0_md">
              <div class="tm_left_footer">
                <div class="tm_mb10 tm_m0_md"></div>
                {{--  <p class="tm_mb5">
                  <b class="tm_primary_color">Paypal & Stripe:</b> <br>
                  invoma@gmail.com
                </p>  --}}
                <p class="tm_mb0">
                  <b class="tm_primary_color">Payment Method:</b> <br>
                  Midtrans
                </p>
              </div>
              <div class="tm_right_footer">
                @if($inv->type_pembayaran == 'pelunasan')
                    <table class="tm_mb15">
                        <tbody>
                            <tr>
                                <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Subtotal</td>
                                <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">Rp. {{ number_format($inv->RincianPelunasan()->first()->nominal_tagihan, 0) }}</td>
                            </tr>
                            <tr>
                                <td class="tm_width_3 tm_danger_color tm_border_none tm_pt0">Down Payment</td>
                                <td class="tm_width_3 tm_danger_color tm_text_right tm_border_none tm_pt0">- Rp. {{ number_format($inv->RincianPelunasan()->first()->nominal_dp,0) }}</td>
                            </tr>
                            <tr>
                                <td class="tm_width_3 tm_border_top_0 tm_bold tm_f18 tm_white_color tm_accent_bg tm_radius_6_0_0_6">Grand Total	</td>
                                <td class="tm_width_3 tm_border_top_0 tm_bold tm_f18 tm_primary_color tm_text_right tm_white_color tm_accent_bg tm_radius_0_6_6_0">Rp. {{ number_format($inv->total_bayar, 0) }}</td>
                            </tr>
                        </tbody>
                    </table>
                @elseif($inv->type_pembayaran == 'dp')
                    <table class="tm_mb15">
                        <tbody>
                            <tr>
                                <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Subtotal</td>
                                <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">Rp. {{ number_format($inv->total_bayar, 0) }}</td>
                            </tr>
                            <tr>
                                <td class="tm_width_3 tm_border_top_0 tm_bold tm_f18 tm_white_color tm_accent_bg tm_radius_6_0_0_6">Grand Total	</td>
                                <td class="tm_width_3 tm_border_top_0 tm_bold tm_f18 tm_primary_color tm_text_right tm_white_color tm_accent_bg tm_radius_0_6_6_0">Rp. {{ number_format($inv->total_bayar, 0) }}</td>
                            </tr>
                        </tbody>
                    </table>
                @endif
              </div>
            </div>
            <div class="tm_invoice_footer tm_type1">
              <div class="tm_left_footer"></div>
              <div class="tm_right_footer">
                <div class="tm_sign tm_text_center">
                  <img src="assets/img/sign.svg" alt="Sign">
                  <p class="tm_m0 tm_ternary_color">Jhon Donate</p>
                  <p class="tm_m0 tm_f16 tm_primary_color">Accounts Manager</p>
                </div>
              </div>
            </div>
          </div>
          <div class="tm_bottom_invoice">
            <div class="tm_bottom_invoice_left">
              <p class="tm_m0 tm_f18 tm_accent_color tm_mb5">Thank you for your business.</p>
              <p class="tm_primary_color tm_f12 tm_m0 tm_bold">Terms & Condition</p>
              <p class="tm_m0 tm_f12">IInvoice was created on a computer and is valid without the signature and seal.</p>
            </div>
            <div class="tm_bottom_invoice_right tm_mobile_hide">
              <div class="tm_logo"><img src="assets/img/logo.svg" alt="Logo"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="tm_invoice_btns tm_hide_print">
        <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
          </span>
          <span class="tm_btn_text">Print</span>
        </a>
        <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
          </span>
          <span class="tm_btn_text">Download</span>
        </button>
      </div>
    </div>
  </div>
  <script src="{{ asset('invoice/js/jquery.min.js') }}"></script>
  <script src="{{ asset('invoice/js/jspdf.min.js') }}"></script>
  <script src="{{ asset('invoice/js/html2canvas.min.js') }}"></script>
  <script src="{{ asset('invoice/js/main.js') }}"></script>
</body>
</html>
