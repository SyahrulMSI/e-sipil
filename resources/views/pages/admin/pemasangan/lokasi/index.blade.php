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
                                    <table id="lokasi" class="table table-striped text-center" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Lokasi</th>
                                                <th>Nama Pelanggan</th>
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
                                                        <a href="#" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> </a>
                                                        <button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </button>
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
            $('#lokasi').DataTable();
        });
    </script>
@endpush
