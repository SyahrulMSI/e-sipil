@extends('layouts.customer')

@section('title', $title)

@section('content')


       <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white font-weight-bold">Transaksi | Pelunasan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="pelunasan" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemasangan</th>
                                            <td>Status</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
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
            $('#pelunasan').DataTable();
        });
       </script>
@endpush
