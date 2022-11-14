@extends('layouts.app')

@section('title', $title)

@section('content')

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white fomt-weight-bold">Data Administrator</h5>
                </div>
                <div class="card-body">
                    <div class="btn-group mb-3">
                        <a href="{{ route('admin.administrator.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped text-center" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Telephone</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n=1;
                                @endphp
                               @foreach ($users as $us)
                                    <tr>
                                        <td>{{ $n }}.</td>
                                        <td>{{ $us->nama_lengkap }}</td>
                                        <td>{{ $us->email }}</td>
                                        <td>
                                            @if ($us->no_telp == null)
                                                <small class="badge badge-info ">No Tidak di Temukan !</small>
                                            @else
                                                {{ $us->no_telp }}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.administrator.show', $us->id) }}" class="btn btn-primary btn-sm  rounded"><i class="fa fa-eye"></i></a>
                                                &nbsp;
                                                <a href="{{ route('admin.administrator.edit', $us->id) }}" class="btn btn-warning btn-sm  rounded"><i class="fa fa-edit"></i></a>
                                                &nbsp;
                                                <button type="button" class="btn btn-danger btn-sm rounded" data-toggle="modal" data-target="#delete{{ $us->id }}"><i class="fa fa-trash"></i></button>
                                            </div>

                                            <div class="modal fade" id="delete{{ $us->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                      <h5 class="modal-title text-white font-weight-bold" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span ar    ia-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="alert alert-warning" role="alert">
                                                                <p>Apakah anda yakin akan menghapus data ini ?</p>
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>

                                                      <form action="{{ route('admin.administrator.destroy', $us->id) }}" method="POST" id="hapus">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"></button>Hapus</button>
                                                      </form>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                        </td>
                                    </tr>
                                @php
                                    $n++;
                                @endphp
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection
