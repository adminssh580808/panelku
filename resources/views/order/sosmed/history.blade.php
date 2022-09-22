@extends('layouts.user-layouts')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-12 mb-1">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="page-title m-0">{{ __('Riwayat Pemesanan') }}</h4>
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
                                    <input type="text" name="search" class="form-control" placeholder="{{ __('Cari') }}">
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
                                    <th>{{ __('Tanggal') }}</th>
                                    <th>{{ __('Layanan') }}</th>
                                    <th>{{ __('Target') }}</th>
                                    <th>{{ __('Jumlah') }}</th>
                                    <th>{{ __('Mulai/Sisa') }}</th>
                                    <th>{{ __('Harga') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Pengembalian') }}</th>
                                    <th>{{ __('Aksi') }}</th>
                                </tr>
                                    @foreach($order as $data_order)
                                    <tr>
                                        <td>#{{ $data_order->id }}</td>
                                        <td>{{ date('Y-m-d H:i', strtotime($data_order->created_at)) }}</td>
                                        <td>{{ $data_order->service->name }}</td>
                                        <td>{{ $data_order->target }}</td>
                                        <td> {{ $data_order->quantity }}</td>
                                        <td>{{ $data_order->start_count }}/{{$data_order->remains}}</td>
                                        <td>{{ convert($data_order->price) }}</td>
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
                                        <td>
                                            <a href="{{ url('order/sosmed/invoice/'.$data_order->id) }}" class="btn btn-primary btn-sm"> {{ __('Invoice') }}</a>
                                        </td>
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
                <div class="col-md-4">

                </div>
            </div>

        </div>
  </div>
    </div>
</div>




</div>
@endsection
