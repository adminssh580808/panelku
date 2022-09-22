@extends('layouts.user-layouts')
@section('content')

<div class="container-fluid">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-print-none">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Invoice</h4>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <hr>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="invoice-title mb-3">
                                <h4 class="float-right font-16"><strong>{{ __('Deposit') }} #{{ $deposit->id }}</strong></h4>
                                <h3 class="m-t-0">
                                    <img src="{{asset(config('web_config')['WEB_LOGO_URL_DARK'])}}" alt="logo" height="28"/>
                                </h3>
                            </div>
                        </div>
                        <div class="col-12">
                                <h2 class="text-center mb-0"><strong>{{ __('Detail Pembayaran') }}</strong></h2>
                                <p class="text-center">{{ date('Y-m-d H:i', strtotime($deposit->created_at)) }}</p>
                                <hr>
                                <p><strong>{{ __('Nominal Transfer') }} :</strong>
                                {{ convert($deposit->quantity) }}</p>
                                <p><strong>{{ __('Pembayaran') }} {{ $deposit->methods->name }} :</strong>
                                {{ $deposit->methods->data }} {{ $deposit->methods->note }}</p>
                                <hr>
                        </div>
                        <div class="col-12 text-center mb-1">
                            <a href="https://wa.me/+6282261011484?text=Confirm%20Deposit%20ID-{{$deposit->id}}" class="btn btn-primary">{{ __('Sudah Membayar') }}</a>
                        </div>
                        <div class="col-12">
                            <h3>{{ __('Cara Pembayaran') }} :</h3>
                            <ul>
                                <li>{{ __('Transfer Ke Rekening Pembayaran') }}</li>
                                <li>{{ __('Klik Tombol Sudah Membayar Jika Sudah Melakukan Transfer') }}</li>
                                <li>{{ __('Saldo Akan Masuk 3-5 Menit Kemudian') }}</li>
                            </ul>
                            <p>{{ __('Jika Saldo Belum Masuk Dalam Kurun Waktu Max 30 Menit Silahkan ') }} <a href="">{{ __('Hubungi Kami') }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


</div> <!-- end container-fluid -->
@endsection
