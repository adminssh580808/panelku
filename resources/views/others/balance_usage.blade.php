@extends('layouts.user-layouts')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h4 class="page-title m-0">{{ __('Penggunaan Saldo') }}</h4>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <hr>
          <div class="section-body">

          	<div class="row">
          		<div class="col-md-12">
          			<div class="card">

		              <div class="card-body">
		                <h4 class='header-title mt-0'><span>{{ __('Riwayat Penggunaan Saldo') }}</span></h4>

						<div class="table-responsive">
							<table class="table table-striped table-md">
								<tr>
									<th>#</th>
									<th>{{ __('Action') }}</th>
									<th>{{ __('Harga') }}</th>
									<th>{{ __('Deskripsi') }}</th>
									<th>{{ __('Tanggal') }}</th>
								</tr>
									@foreach($balance_histories as $history)
									<tr>
										<td>{{ $history->id }}</td>
										<td>
											<span class="badge badge-{{ ($history->action == 'Cut Balance') ? 'danger' : 'success' }}">
												{{ $history->action }}
											</span>
										</td>
										<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($history->quantity,0,'.','.') }}</td>
										<td>{{ $history->desc }}</td>
										<td>{{ date('d F Y H:i:s', strtotime($history->created_at)) }}</td>
									</tr>
									@endforeach
							</table>
						</div>
						<div class="float-right">
							{{ $balance_histories->links() }}
						</div>

		              </div>

		            </div>
          		</div>
          	</div>

          </div>
    </div>
</div>




</div>
@endsection
