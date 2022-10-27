@extends('layouts.app')

@section('title', $title)

@section('content')


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="btn-group mb-3">
                            <a href="#" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="table-responsive">
                                    <table id="invoice" class="table table-striped text-center" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Nomor Transaksi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Pati - Sukoharjo</td>
                                                <td>M. Syharul Imron</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-warning btn-sm"> <i class="fa fa-print"></i> Cetak Invoice</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>


            </div>

@endsection

@push('after-script')
    <script>
        $(document).ready(function () {
            $('#invoice').DataTable();
        });
    </script>
@endpush
