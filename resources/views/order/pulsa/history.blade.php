@extends('layouts.user-layouts')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
      	<div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0">Riwayat Pemesanan</h4>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>

          
      	<div class="row">
      		<div class="col-12">
      			<div class="card">
	              	<div class="card-body">
		                <h4 class='header-title mt-0'><span>Riwayat Pemesanan Pulsa</span></h4>
		              	<div class="alert alert-info">
		              		<i data-feather='globe'></i> : Order melalui web <br>
		              		<i data-feather='shuffle'></i> : Order melalui API
		              	</div>
						<div class="form">
								<div class="row">
									<div class="col-md-6 offset-md-6">
											<form method="GET">
												<div class="input-group mb-3">
													<div class="input-group-prepend">
													    <span class="input-group-text" id="basic-addon1"><i data-feather='search'></i></span>
													  </div>
													<input type="text" placeholder="Cari target atau id pesanan" class="form-control" name="search">
												</div>
											</form>
									</div>
								</div>
						</div>
						<div class="table-responsive">
							<table class="table table-striped table-md">
								<tr>
									<th></th>
									<th>Order ID</th>
									<th>Service</th>
									<th>Target</th>
									<th>Harga</th>
									<th>SN</th>
									<th>Status</th>
									<th>Refund</th>
									<th>Aksi</th>
									
								</tr>
									@foreach($order as $data_order)
									<tr>
										<td><i data-feather="{{ ($data_order->place_from == 'WEB' ? 'globe' : 'shuffle') }}"></i></td>
										<td>#{{ $data_order->id }}</td>
										<td>{{ $data_order->service->name }}</td>
										<td>{{ $data_order->data }}</td>
										<td>{{ config('web_config')['CURRENCY_CODE'] }} {{ Numberize::make($data_order->price) }}</td>
										<td>{{ $data_order->sn }}</td>
										
										<td><span class="badge badge-{{ ($data_order->status === 'Pending') ? 'warning' : (($data_order->status == 'Error' || $data_order->status == 'Partial') ? 'danger' : (($data_order->status == 'Processing') ? 'primary' : 'success')) }}">{{ $data_order->status }}</span></td>
										<td>
											<span class="badge badge-{{ ($data_order->refund==0) ? 'danger' : 'success'}}">
												@if($data_order->refund == 0) 
													<i data-feather='clock'></i>
												@else
													<i data-feather='check'></i>
												@endif
											</span>
										</td>
										<td><button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#default">Hubungi Admin</button></td>
										<!-- Modal -->
                <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">Hubungi Admin</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer text-center" style="justify-content: center;">
                                <a href="https://wa.me/+6282261011484?text=Bisa%20Bantu%20Saya%20Dengan%20ID%20Orderan%20{{$data_order->id}}%3F" class="btn btn-success">Whatsapp</a>
                                <a href="https://t.me/OwnColecallMedia" class="btn btn-primary">Teleram</a>
                                <a href="{{url('ticket')}}" class="btn btn-info">Tiket</a>
                            </div>
                        </div>
                    </div>
                </div>
									</tr>
									@endforeach
							</table>
						</div>
						<div class="float-right">
							{{ $order->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>              
    </div>
        
</div>
            



</div>
@endsection