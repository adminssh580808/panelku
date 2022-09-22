@extends('layouts.user-layouts')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-12 mb-1">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="page-title m-0">{{ __('Daftar Layanan') }}</h4>
                    <hr class="mt-2">
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
    <div class="col-sm-12">
          <div class="section-body">
          	<div class="row">
          		<div class="col-12">
          			<div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Daftar Layanan') }}</h4>
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
                                <form method="GET">
                                    <div class="input-group">
                                    <select class="form-control select2" id="type" name="search">
                                        <option value="">{{ __('Cari Kategori') }}</option>
                                        @forelse ($category as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @empty
                                        Belum Ada Data
                                        @endforelse
                                    </select>
                                      <div class="input-group-append">
                                        <button class="btn btn-primary"><i data-feather='search'></i></button>
                                      </div>
                                    </div>
                                </form>
                            </div>
                        </div>
		              <div class="card-body">
	                      <div class="clearfix mb-3"></div>
						<div class="table-responsive">
							<table class="table table-striped table-lg">
								<tr>
									<th>ID</th>
									<th>{{ __('Kategori') }}</th>
									<th>{{ __('Layanan') }}</th>
									<th>Min/Max</th>
									<th>{{ __('Price') }}</th>
									<th>Status</th>
									<th>{{ __('Action') }}</th>
								</tr>
									@foreach($service as $data_service)
									<tr>
										<td id="service_id">{{ $data_service->id }}</td>
										<td>{{ $data_service->category->name }}</td>
										<td>{{ $data_service->name }}</td>
										<td>{{ $data_service->min }}/{{ $data_service->max }}</td>
										<td>{{ convert($data_service->price+$data_service->keuntungan) }}</td>
										<td><span class="badge badge-{{ ($data_service->status=='Active') ? 'success':'danger' }}">{{ $data_service->status }}</span></td>
										<td>
                                            {{-- <a class="btn btn-info mb-1" data-bs-toggle="modal" data-bs-target="default">Hello</a> --}}
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#default{{ $data_service->id }}">
                                                {{ __('Deskripsi') }}
                                            </button>
											{{-- <button type='button' href="#" class="btn btn-secondary detailSosmed">Detail</button> --}}
										</td>
									</tr>
                                    <div class="basic-modal">
                                        <div class="modal fade text-left" id="default{{ $data_service->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel1">{{ $data_service->id }} - {{ $data_service->name }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            {!! nl2br(htmlentities($data_service->note)) !!}<br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									@endforeach
                                    <!-- Modal -->

							</table>
						</div>
						<div class="float-right">
							{{ $service->links() }}
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
