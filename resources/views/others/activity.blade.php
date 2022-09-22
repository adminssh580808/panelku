@extends('layouts.user-layouts')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h4 class="page-title m-0">{{ __('Aktifitas') }}</h4>
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
		                <h4 class='header-title mt-0'><span>{{ __('Riwayat Aktifitas') }}</span></h4>

						<div class="table-responsive">
							<table class="table table-striped table-md">
								<tr>
									<th>#</th>
									<th>{{ __('Tanggal') }}</th>
									<th>{{ __('Tipe') }}</th>
									<th>IP</th>
									<th>{{ __('Pengguna') }}</th>
								</tr>
									@foreach($activities as $activity)
									<tr>
										<td>{{ $activity->id }}</td>
										<td>{{ date('d F Y H:i:s', strtotime($activity->created_at)) }}</td>
										<td>{{ $activity->type }}</td>
										<td>{{ $activity->ip }}</td>
										<td>{{ $activity->user_agent }}</td>
										<td>{{ $activity->price }}</td>
									</tr>
									@endforeach
							</table>
						</div>
						<div class="float-right">
							{{ $activities->links() }}
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
