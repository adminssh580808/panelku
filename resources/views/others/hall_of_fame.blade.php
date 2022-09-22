@extends('layouts.user-layouts')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0">TOP 10 {{__('BULAN LALU')}}</h4>
                </div>
                <!-- end col -->
            </div>
            <hr>
            <!-- end row -->
        </div>

          <div class="section-body">

          	<div class="row">
      <!--    		<div class="col-md-6">-->
      <!--    			<div class="card">-->


		    <!--          <div class="card-body">-->
		    <!--            <h4 class='header-title mt-0'><span>{{ __('Top 10 Pembelian Sosial Media') }}</span></h4>-->

						<!--<div class="table-responsive">-->
						<!--	<table class="table table-striped table-md">-->
						<!--		<tr>-->
						<!--			<th>#</th>-->
						<!--			<th>{{ __('Pengguna') }}</th>-->
						<!--			<th>{{ __('Total') }}</th>-->
						<!--		</tr>-->
      <!--                          @foreach($top_orders as $order)-->
      <!--                        <tr>-->
      <!--                            <td>1</td>-->
      <!--                            <td>{{ $order->name1 }}</td>-->
      <!--                            <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order->total1) }}</td>-->
      <!--                        </tr>-->
      <!--                        <tr>-->
      <!--                          <td>2</td>-->
      <!--                          <td>{{ $order->name2 }}</td>-->
      <!--                          <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order->total2) }}</td>-->
      <!--                      </tr>-->
      <!--                      <tr>-->
      <!--                          <td>3</td>-->
      <!--                          <td>{{ $order->name3 }}</td>-->
      <!--                          <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order->total3) }}</td>-->
      <!--                      </tr>-->
      <!--                      <tr>-->
      <!--                          <td>4</td>-->
      <!--                          <td>{{ $order->name4 }}</td>-->
      <!--                          <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order->total4) }}</td>-->
      <!--                      </tr>-->
      <!--                      <tr>-->
      <!--                          <td>5</td>-->
      <!--                          <td>{{ $order->name5 }}</td>-->
      <!--                          <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order->total5) }}</td>-->
      <!--                      </tr>-->
      <!--                        @endforeach-->
      <!--                        @forelse($top_orders as $order)-->
      <!--                        @empty-->
      <!--                        <tr>-->
      <!--                            <td colspan="3" class="text-center">No data</td>-->
      <!--                        </tr>-->
      <!--                        @endforelse-->
						<!--	</table>-->
						<!--</div>-->

		    <!--          </div>-->

		    <!--        </div>-->
      <!--    		</div>-->
                  <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <h4 class='header-title mt-0'><span>{{ __('Top 10 Deposit Tertinggi') }}</span></h4>

                      <div class="table-responsive">
                          <table class="table table-striped table-md">
                              <tr>
                                  <th>#</th>
                                  <th>{{ __('Pengguna') }}</th>
                                  <th>{{ __('Total') }}</th>
                              </tr>
                              @foreach($top_deposits as $deposit)
                              <tr>
                                  <td>1</td>
                                  <td>{{ $deposit->name1 }}</td>
                                  <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($deposit->total1) }}</td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>{{ $deposit->name2 }}</td>
                                <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($deposit->total2) }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>{{ $deposit->name3 }}</td>
                                <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($deposit->total3) }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>{{ $deposit->name4 }}</td>
                                <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($deposit->total4) }}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>{{ $deposit->name5 }}</td>
                                <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($deposit->total5) }}</td>
                            </tr>
                              @endforeach
                              @forelse($top_deposits as $deposit)
                              @empty
                              <tr>
                                  <td colspan="3" class="text-center">No data</td>
                              </tr>
                              @endforelse
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
          		<div class="col-md-6">
          			<div class="card">


		              <div class="card-body">
		                <h4 class='header-title mt-0'><span>{{ __('Top 10 Pembelian Sosial Media') }}</span></h4>

						<table class="table table-striped table-md">
								<tr>
									<th>#</th>
									<th>{{ __('Pengguna') }}</th>
									<th>{{ __('Total') }}</th>
								</tr>
                                @foreach($top_orders as $order)
                              <tr>
                                  <td>1</td>
                                  <td>{{ $order->name1 }}</td>
                                  <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order->total1) }}</td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>{{ $order->name2 }}</td>
                                <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order->total2) }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>{{ $order->name3 }}</td>
                                <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order->total3) }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>{{ $order->name4 }}</td>
                                <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order->total4) }}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>{{ $order->name5 }}</td>
                                <td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($order->total5) }}</td>
                            </tr>
                              @endforeach
                              @forelse($top_orders as $order)
                              @empty
                              <tr>
                                  <td colspan="3" class="text-center">No data</td>
                              </tr>
                              @endforelse
							</table>
						</div>
		              </div>
		            </div>
          		</div>
          	</div>
  			{{-- <div class="card">
              <div class="card-body">
                <h4 class='header-title mt-0'><span>Top 10 Layanan Sosial Media</span></h4>

				<div class="table-responsive">
					<table class="table table-striped table-md">
						<tr>
							<th>#</th>
							<th>Nama Layanan</th>
							<th>Pembelian</th>
						</tr>
						@foreach($top_layanan as $layanan)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $layanan->name }}</td>
							<td>{{ $layanan->jumlah_order }} Pembelian</td>
						</tr>
						@endforeach
						@forelse($top_layanan as $layanan)
						@empty
						<tr>
							<td colspan="3" class="text-center">No data</td>
						</tr>
						@endforelse
					</table>
				</div>
              </div>
            </div> --}}


          </div>
        </section>




</div>
@endsection
