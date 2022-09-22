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
        <hr>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="invoice-title">
                                <h4 class="float-right font-16"><strong>Order #{{ $order->id }}</strong></h4>
                                <h3 class="m-t-0">
                                    <img src="{{asset(config('web_config')['WEB_LOGO_URL_DARK'])}}" alt="logo" height="28"/>
                                </h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <address>
                                        <h2><strong>Detail Order</strong></h2><br>
                                        <strong>{{ __('Pengguna') }} :</strong>
                                        {{$order->user->name}}<br>
                                        <strong>{{ __('No Whatsapp') }} :</strong>
                                        {{$order->user->phone}}<br>
                                    </address>
                                </div>
                                <div class="col-6  text-right">
                                    <address>
                                        <strong>{{ __('Tanggal Order') }}:</strong><br>
                                        {{ date('F d, Y', strtotime($order->created_at)) }}<br><br>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 m-t-30">
                                    <address>
                                        <strong>{{ __('Pembayaran') }} :</strong><br>
                                        {{ __('SALDO') }} {{ config('web_config')['APP_NAME'] }}<br>
                                    </address>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="panel panel-default">
                                <div class="p-2">
                                    <h3 class="panel-title font-20"><strong>{{ __('Ringkasan Order') }}</strong></h3>
                                </div>
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <td><strong>{{ __('Layanan') }}</strong></td>
                                                <td class="text-center"><strong>{{ __('Jumlah') }}</strong>
                                                </td>
                                                <td class="text-center"><strong>{{ __('Harga') }}/1000</strong></td>
                                                <td class="text-right"><strong>{{ __('Total') }}</strong></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td>{{$order->service->name}}</td>
                                                <td class="text-center">{{ Numberize::make($order->quantity) }}</td>
                                                <td class="text-center">{{convert( ($order->place_from=='WEB'?$order->service->price:$order->service->price_oper)+$order->service->keuntungan)}}</td>
                                                <td class="text-right">{{ convert($order->price,2) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center">
                                                    <strong>{{ __('Total') }}</strong></td>
                                                <td class="no-line text-right"><h4 class="m-0">{{ convert($order->price) }}</h4></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-print-none mo-mt-2">
                                        <div class="float-right">
                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i data-feather='printer'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end row -->

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


</div> <!-- end container-fluid -->
@endsection
