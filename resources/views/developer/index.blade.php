@extends('layouts.developer-layouts')
@section('content')
<div class="container-fluid">
<div class="container-fluid">
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title m-0">Developer Page</h4>
            </div>
            <!-- end col -->
        </div>
        <hr>
        <!-- end row -->
    </div>
	<div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card bg-pink mini-stat text-white">
                <div class="p-1 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Member Aktif</h6>
                        <h4 class="mb-1 mt-0 float-right">{{Numberize::make($member['active'])}}</h4>
                    </div>
                    <hr>
                    <div>
                        <span class="badge badge-light text-primary mb-1">Pendaftar bulan ini: {{ $member['register_thismo'] }}</span><br>
                        @if(empty($last_used_balance->created_at))
                        <span class="text-primary">Total saldo: {{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($member['total_saldo']->balance) }}</span>
                        @else
                        <span class="text-primary">Terakhir penggunaan: {{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($last_used_balance->quantity) }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6">
            <div class="card bg-primary mini-stat text-white">
                <div class="p-1 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Order SOSMED bulan ini</h6>
                        <h4 class="mb-1 mt-0 float-right">{{$order_sosmed_thismo[0]->total_order}}</h4>
                    </div>
                    <div>
                        <span class="badge badge-light text-primary">{{$order_sosmed_thismo['lastmo']}} </span> <span class="ml-2">Bulan Kemarin</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card bg-info mini-stat text-white">
                <div class="p-1 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Order PULSA bulan ini</h6>
                        <h4 class="mb-1 mt-0 float-right">{{$order_pulsa_thismo[0]->total_order}}</h4>
                    </div>
                    <div>
                        <span class="badge badge-light text-primary">{{$order_pulsa_thismo['lastmo']}} </span> <span class="ml-2">Bulan Kemarin</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="card bg-pink mini-stat text-white">
                <div class="p-1 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Keuntungan</h6>
                        <h4 class="mb-1 mt-0 float-right">{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order_pulsa_alltime['keuntungan']->keuntungan + $order_sosmed_alltime[0]->keuntungan) }}</h4>
                    </div>
                    <hr>
                    <div>
                        <span class=""> Total keuntungan sosmed & pulsa </span><br><br>
                        <span class="badge badge-light text-primary mb-1">Bulan ini: {{Numberize::make($order_pulsa_thismo[0]->keuntungan)}}</span><br>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<!-- end row -->
	<div class="row">
		<div class="col-md-4">
  			<div class="card">
                <div class="card-body">
	                <h4 class='header-title mt-0'><span>Statistik Sosmed</span></h4>
	                <div class="mb-2">Bulan Ini:</div>
	                <div class="table-responsive mb-3">
	                	<table class="table table-bordered">
	                		<tr>
	                			<td>Total Order:</td>
	                			<td>{{ Numberize::make($order_sosmed_thismo[0]->total_order) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Nominal Order:</td>
	                			<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order_sosmed_thismo[0]->total_price) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Keuntungan:</td>
	                			<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order_sosmed_thismo['keuntungan']) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Refund:</td>
	                			<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order_sosmed_thismo['refund']->quantity) }}</td>
	                		</tr>
	                	</table>
	                </div>
	                <div class="mb-2">Semua Waktu:</div>
	                <div class="table-responsive">
	                	<table class="table table-bordered">
	                		<tr>
	                			<td>Total Order:</td>
	                			<td>{{ Numberize::make($order_sosmed_alltime[0]->total_order) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Nominal Order:</td>
	                			<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order_sosmed_alltime[0]->total_price) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Keuntungan:</td>
	                			<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order_sosmed_alltime['keuntungan']) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Layanan:</td>
	                			<td>{{ Numberize::make($services['sosmed']['total']) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Order Pending:</td>
	                			<td>{{ Numberize::make($order_sosmed_alltime['pending']) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Order Success:</td>
	                			<td>{{ Numberize::make($order_sosmed_alltime['success']) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Order Processing:</td>
	                			<td>{{ Numberize::make($order_sosmed_alltime['processing']) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Order Error/Partial:</td>
	                			<td>{{ Numberize::make($order_sosmed_alltime['error']) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Refund:</td>
	                			<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order_sosmed_alltime['refund']->quantity) }}</td>
	                		</tr>
	                	</table>
	                </div>
            	</div>
            </div>
		</div>
		<div class="col-md-4">
  			<div class="card">
                <div class="card-body">
	                <h4 class='header-title mt-0'><span>Statistik Pulsa</span></h4>
	                <div class="mb-2">Bulan Ini:</div>
	                <div class="table-responsive mb-3">
	                	<table class="table table-bordered">
	                		<tr>
	                			<td>Total Order:</td>
	                			<td>{{ Numberize::make($order_pulsa_thismo[0]->total_order) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Nominal Order:</td>
	                			<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order_pulsa_thismo[0]->total_price) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Keuntungan:</td>
	                			<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order_pulsa_thismo['keuntungan']->keuntungan) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Refund:</td>
	                			<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order_pulsa_thismo['refund']->price) }}</td>
	                		</tr>
	                	</table>
	                </div>
	                <div class="mb-2">Semua Waktu:</div>
	                <div class="table-responsive">
	                	<table class="table table-bordered">
	                		<tr>
	                			<td>Total Order:</td>
	                			<td>{{ Numberize::make($order_pulsa_alltime[0]->total_order) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Nominal Order:</td>
	                			<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order_pulsa_alltime[0]->total_price) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Keuntungan:</td>
	                			<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order_pulsa_alltime['keuntungan']->keuntungan) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Layanan:</td>
	                			<td>{{ Numberize::make($services['pulsa']['total']) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Order Pending:</td>
	                			<td>{{ Numberize::make($order_pulsa_alltime['pending']) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Order Success:</td>
	                			<td>{{ Numberize::make($order_pulsa_alltime['success']) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Order Error/Partial:</td>
	                			<td>{{ Numberize::make($order_pulsa_alltime['error']) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Refund:</td>
	                			<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order_pulsa_thismo['refund']->price) }}</td>
	                		</tr>
	                	</table>
	                </div>
            	</div>
            </div>
		</div>
		<div class="col-md-4">
  			<div class="card">
                <div class="card-body">
	                <h4 class='header-title mt-0'><span>Statistik Pengguna</span></h4>
	                <div class="mb-2">Bulan Ini:</div>
	                <div class="table-responsive mb-3">
	                	<table class="table table-bordered">
	                		<tr>
	                			<td>Pendaftar baru:</td>
	                			<td>{{ Numberize::make($member['register_thismo']) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Total Penggunaan Saldo:</td>
	                			<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($member['penggunaan_saldo']->quantity) }}</td>
	                		</tr>
	                	</table>
	                </div>
	                <div class="mb-2">Semua Waktu:</div>
	                <div class="table-responsive">
	                	<table class="table table-bordered">
	                		<tr>
	                			<td>Total Seluruh Saldo:</td>
	                			<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($member['balance_total']->balance) }}</td>
	                		</tr>
	                		<tr>
	                			<td>Jumlah Pengguna:</td>
	                			<td>{{ Numberize::make($member['count']) }}</td>
	                		</tr>
	                	</table>
	                </div>
            	</div>
            </div>
		</div>
	</div>
</div>
</div>
@endsection
