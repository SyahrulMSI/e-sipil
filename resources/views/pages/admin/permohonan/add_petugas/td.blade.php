@extends('layouts.app')

@section('title', $title)

@section('content')


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="btn-group mb-3">
                            <a href="{{ route('admin.list_permohonan.index') }}" class="btn btn-warning btn-sm rounded"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            &nbsp;
                            <button type="button" class="btn btn-success btn-sm rounded" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah Data</button>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="table-responsive">
                                    <table id="petugas" class="table table-striped text-center" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Petugas</th>
                                                <th>Status </th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $n=1;
                                            @endphp
                                           @foreach ($tugas as $t)
                                            <tr>
                                                <td>{{ $n }}.</td>
                                                <td>{{ $t->Petugas->nama_lengkap }}</td>
                                                <td>
                                                    @if ($t->status == 0)
                                                        <span class="badge badge-danger">Menunggu di Survei</span>
                                                    @else
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group">

                                                        <button type="button" data-toggle="modal" data-target="#delete{{ $t->id }}" class="btn btn-danger btn-sm rounded"> <i class="fa fa-edit"></i> Hapus</button>


                                                        <div class="modal fade" id="delete{{ $t->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                              <div class="modal-content">
                                                                <div class="modal-header bg-danger text-white">
                                                                  <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="alert alert-danger text-center font-weight-bold" role="alert">
                                                                            <p>Apakah anda yakin akan menghapus data ini ?</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                                <form action="{{ route('admin.add_petugas_td.destroy', $t->id) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                                </form>
                                                                </div>
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
                </div>


            </div>


            <div class="modal fade" id="add" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                      <h5 class="modal-title" id="staticBackdropLabel">Tambah Petugas</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('admin.list_permohonan.add_petugas_td.store', $td->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')

                                    <div class="form-group">
                                        <label for="">Pilih Petugas:</label>
                                        <select name="id_petugas" class="form-control shadow">
                                            <option selected>-- Pilih Petugas --</option>
                                            @forelse ($petugas as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama_lengkap }}</option>
                                            @empty
                                                <option>Data Tidak di Temukan</option>
                                            @endforelse
                                        </select>
                                        @error('id_petugas')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                  </div>
                </div>
              </div>


@endsection

@push('after-script')
    <script>
        $(document).ready(function () {
            $('#petugas').DataTable();
        });
    </script>
@endpush
