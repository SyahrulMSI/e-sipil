@extends('layouts.customer')

@section('title', $title)

@push('after-style')

@endpush

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-5">
                <img src="{{ asset('illustration/success_payment.png') }}" width="100%" alt="">
            </div>

            <div class="col-lg-12 d-flex justify-content-center">
                <div class="btn-group mt-3 mb-3">
                    <a href="{{ route('customer.dashboard.index') }}" class="btn btn-primary btn-sm rounded shadow">Dashboard</a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
