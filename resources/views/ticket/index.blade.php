@extends('layouts.user-layouts')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h4 class="page-title m-0">{{ __('Ticket') }}</h4>
                </div>
                <!-- end col -->
            </div>
            <hr>
            <!-- end row -->
        </div>
          <div class="section-body">

          	<div class="row">
          		<div class="col-12">
          			<div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Ticket Saya') }}</h4>
                            @if(session('success'))
	                        <div class="alert alert-primary" role="alert">
	                            <i class="fa fa-check-circle"></i> {!! session('success') !!}
	                        </div>
                            @elseif(session('danger'))
                                <div class="alert alert-danger" role="alert">
                                    <i class="fa fa-exclamation-circle"></i> {{ session('danger') }}
                                </div>
                            @endif
                            @if ($errors->has('quantity'))
                                    <div class="alert alert-danger" role="alert">
                                        <i class="fa fa-exclamation-circle"></i> {{ $errors->first('quantity') }}
                                    </div>
                            @endif
                            <div class="basic-modal">
                                <a href="{{ url('ticket/add') }}" class="btn btn-primary">{{ __('Tiket Baru') }}</a>
                            </div>
                        </div>
		              <div class="card-body">
						<div class="clearfix mb-1"></div>
						<div class="table-responsive">
							<table class="table table-striped">
								<tr>
									<th>ID</th>
									<th>{{ __('Judul') }}</th>
									<th>Status</th>
									<th>{{ __('Action') }}</th>
								</tr>
								@foreach($tickets as $ticket)
								<tr>
									<td>#{{ $ticket->id }}</td>
									<td>
										@if($ticket->read_by_user == false)
										<span class="badge badge-primary">Belum dibaca</span>
										@endif
										{{ substr($ticket->subject,0,70) }}..</td>
									<td>
										<span class="badge badge-{{($ticket->status == 'Open'?'success':($ticket->status == 'Closed'?'danger':'info'))}}">{{ $ticket->status }}</span>
									</td>
									<td><a href="{{ url('/ticket/'.$ticket->id) }}" class="btn btn-secondary">
										<i data-feather='eye'></i>
									</a></td>
								</tr>
								@endforeach
							</table>
						</div>

		              </div>

		            </div>
          		</div>
          		<div class="col-md-4">

          		</div>
          	</div>

          </div>
    </div>
</div>




</div>
@endsection
