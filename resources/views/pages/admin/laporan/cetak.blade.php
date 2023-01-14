<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    <table id="t_today" class="table table-striped" border="1" style="width:100%; text-align:center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Jenis Permohonan</th>
                <th>Type Transaksi</th>
                <th>Total Bayar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $n=1;
            @endphp
            @foreach ($transaksi as $t)
                <tr>
                    <td>{{ $n }}</td>
                    <td>{{ $t->User->nama_lengkap }}</td>
                    <td>
                                    @if ($t->id_tambah_daya != null)
                                        <span class="badge badge-info badge-sm">Tambah Daya</span>
                                    @elseif($t->id_pemasangan_baru != null)
                                        <span class="badge badge-info badge-sm">Pemasangan Baru</span>
                                    @elseif($t->id_instalasi != null)
                                        <span class="badge badge-info badge-sm">Instalasi Bangunan Baru</span>
                                    @elseif($t->id_service != null)
                                        @if ($t->Service->jenis_service == 'meter_listrik')
                                            <span class="badge badge-info badge-sm">Service Meter Listrik</span>
                                        @elseif ($t->Service->jenis_service == 'listrik_bangunan')
                                            <span class="badge badge-info badge-sm">Service Listrik Bangunan</span>
                                        @endif
                                    @endif
                    </td>
                    <td>
                        @if($t->type_pembayaran == 'dp')
                            <span class="badge badge-danger">Uang Muka</span>
                        @elseif($t->type_pembayaran == 'pelunasan')
                            <span class="badge badge-success">Pelunasa</span>
                        @endif
                    </td>
                    <td>Rp. {{ number_format($t->total_bayar, 0) }}</td>
                    <td>
                        @if($t->status == 'SUCCESS')
                            <span class="badge badge-primary badge-sm">BERHASIL</span>
                        @elseif($t->status == 'WAITING')
                            <span class="badge badge-primary badge-sm">MENUNGGU</span>
                        @elseif($t->status == 'FAILED')
                                <span class="badge badge-primary badge-sm">GAGAL</span>
                        @elseif($t->status == 'PENDING')
                            <span class="badge badge-primary badge-sm">DITUNDA</span>
                        @endif
                    </td>
                </tr>
            @php
               $n++;
            @endphp
            @endforeach
        </tbody>
    </table>
</body>
<script>
    window.print();
</script>
</html>
