@extends('layouts.customer')

@section('title', $title)

@section('content')


       <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white font-weight-bold">Transaksi | Down Payment</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="dp" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemasangan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
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
            $('#dp').DataTable();
        });
       </script>
@endpush
