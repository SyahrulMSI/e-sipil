@extends('layouts.petugas')

@section('title', $title)

@section('content')

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white fomt-weight-bold">Daftar Tugas</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Customer</th>
                                    <th>Jenis Layanan</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Example User</td>
                                    <td>Pasang Baru</td>
                                    <td>Lorem ipsum dolor sit amet</td>
                                    <td>
                                        <span class="badge badge-warning badge-sm">Di Proses</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Ubah Status</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection